<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserStore;
use Hash;
use DB;
use App\models\Userinfo;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $req=$request->all();
        $condition=[];
        if(!empty($req['content'])){
            $condition[]=['uname','like','%'.$req['content'].'%'];
        }
        $data=User::where($condition)->paginate(3);
        //$data=User::all();
        return view('/admin/user/index',['title'=>'用户列表','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/user/create',['title'=>'用户添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStore $request)
    {
        
        //开启事务
        DB::beginTransaction();

        $user=new User;

        if($request->hasFile('face')){
            $path = $request->file('face')->store('images');
            $user->face='/uploads/'.$path;
        }
        $user->uname=$request->uname;
        $user->pwd=Hash::make($request->pwd);
        $user->sex=$request->sex;
        $user->tel=$request->tel;
        $user->email=$request->email;
        $res=$user->save();

        $userinfo=new Userinfo;
        $userinfo->uid=$user->id;
        $res1=$userinfo->save();

        if($res && $res1){
            DB::commit();  //提交事务
            return redirect('/admin/user')->with('success','添加成功');
        }else{
            DB::rollBack();
            return redirect('error','添加失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=User::find($id);
        return view('/admin/user/edit',['data'=>$data,'title'=>'用户修改']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $data=$request->except(['_token']);
        ///dd($data);
        $user=User::find($id);
        $user->sex=$data['sex'];
        $user->face=$data['face'];
        $user->tel=$data['tel'];
        $user->email=$data['email'];
        $res=$user->save();

        if($res){
            DB::commit();  //提交事务
            return redirect('/admin/user')->with('success','修改成功');
        }else{
            DB::rollBack();
            return redirect('error','修改失败');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=User::destroy($id);
        $res1=Userinfo::where('uid',$id)->delete();
        DB::beginTransaction();
        if($res && $res1){
            DB::commit();  //提交事务
            echo 'success';exit;
        }else{
            DB::rollBack();
            echo 'error';exit;
        }

    }
}
