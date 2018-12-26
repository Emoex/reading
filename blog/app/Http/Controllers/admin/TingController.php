<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ting;
use App\Http\Requests\TingStore;
use DB;

class TingController extends Controller
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
        $data=Ting::where($condition)->paginate(3);
        return view('/admin/ting/index',['title'=>'电台列表','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/ting/create',['title'=>'添加电台']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TingStore $request)
    {
        $reqs=$request->except(['_token']);
        DB::beginTransaction();
        $ting=new Ting;
        $ting->title=$reqs['title'];
        $ting->tname=$reqs['tname'];
        if($request->hasFile('img')){
            $path = $request->file('img')->store('images');
            $ting->img='/uploads/'.$path;
        }
        if($request->hasFile('music')){
            $music = $request->file('music')->store('music');
            $ting->music='/uploads/'.$music;
        }
        $res=$ting->save();
        if($res){
            DB::commit();  //提交事务
            return redirect('/admin/ting')->with('success','添加成功');
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

        $data=Ting::find($id);
        return view('/admin/ting/edit',['title'=>'修改电台','data'=>$data]);
        /*
        
        ///
        $ting=Ting::find($id);
        $ting->sex=$data['sex'];
        $ting->face=$data['face'];
        $ting->tel=$data['tel'];
        $ting->email=$data['email'];
        $res=$ting->save();

        if($res){
            DB::commit();  //提交事务
            return redirect('/admin/user')->with('success','修改成功');
        }else{
            DB::rollBack();
            return redirect('error','修改失败');
        }*/
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
        //
        DB::beginTransaction();
        $data=$request->except(['_token']);
        dd($data);
        $ting=Ting::find($id);
        $ting->title=$data['title'];
        $ting->tname=$data['tname'];
        $ting->img=$data['img'];
        $ting->tingcate=$data['tingcate'];
        $res=$ting->save();
        if($res){
            DB::commit();  //提交事务
            return redirect('/admin/ting')->with('success','修改成功');
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
        $res=Ting::destroy($id);
       // $res1=Userinfo::where('uid',$id)->delete();
        DB::beginTransaction();
        if($res){
            DB::commit();  //提交事务
            echo 'success';exit;
        }else{
            DB::rollBack();
            echo 'error';exit;
        }
    }
}
