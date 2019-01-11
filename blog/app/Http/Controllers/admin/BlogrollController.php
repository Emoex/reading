<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blogroll;
use DB;

class BlogrollController extends Controller
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
            $condition[]=['name','like','%'.$req['content'].'%'];
        }
        $data=Blogroll::where($condition)->paginate(3);
        return view('/admin/blogroll/index',['title'=>'友情链接列表','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/blogroll/create',['title'=>'添加友情链接']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req=$request->except(['_token']);
        DB::beginTransaction();
        $blogroll=new Blogroll;
        $blogroll->name=$req['bname'];
        $blogroll->url=$req['burl'];
        $res=$blogroll->save();

        if($res){
            DB::commit();  //提交事务
            return redirect('/admin/blogroll')->with('success','添加成功');
        }else{
            DB::rollBack();
            return redirect('blogroll','添加失败');
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
        $data=Blogroll::find($id);
        return view('/admin/blogroll/edit',['data'=>$data,'title'=>'友情链接修改']);
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

        $blogroll=Blogroll::find($id);
        $blogroll->name=$data['bname'];
        $blogroll->url=$data['burl'];
        $res=$blogroll->save();

        if($res){
            DB::commit();  //提交事务
            return redirect('/admin/blogroll')->with('success','修改成功');
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
        $res=Blogroll::destroy($id);
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
