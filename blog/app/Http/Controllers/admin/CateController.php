<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\ArticleCate;
use App\models\TimelineCate;
use App\models\TingCate;
class CateController extends Controller
{
    static public function getObj($cate)
    {
        if($cate == 1){
            $obj = new ArticleCate;
        }else if($cate == 2) {
            $obj = new TimelineCate;
        }else if($cate == 3){
            $obj = new TingCate;
        }
        return $obj;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name','');
        $cate = $request->input('cate','1');
        $params['name'] = $name;
        $params['cate'] = $cate;
        $obj = self::getObj($cate);
        $data = $obj->where('name','like','%'.$name.'%')->paginate(5);
        return view('admin/cate/index',['title'=>'分类列表','params'=>$params,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/cate/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cate = $request->cate;
        $obj = self::getObj($cate);
        $obj->name = $request->name;
        if($request->hasFile('path')){
            $obj->path = '/uploads/'.$request->file('path')->store('images');
        }
        $res = $obj->save();
        if($res){
            return redirect('admin/cate')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
    public function edit(Request $request,$id)
    {
        $cate = $request->cate;
        $obj = self::getObj($cate);
        $data = $obj->find($id);
        $data->cate = $cate;
        return view('admin/cate/edit',['title'=>'分类修改','data'=>$data]);
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
        $obj = self::getObj($request->cate)->find($id);
        $obj->name = $request->name;
        if($request->hasFile('path')){
            $obj->path = '/uploads/'.$request->file('path')->store('images');
        }
        $res = $obj->save();
        if($res){
            return redirect('admin/cate')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $cate = $request->cate;
        $obj = self::getObj($cate);
        $one = $obj->find($id);
        if($one->face){
        $res = Storage::delete(ltrim($one->face,'/uploads/'));
      }
        $res = $one->delete();
        if($res){
            echo 'success';
        }else{
            echo 'error';
        }
    }
}
