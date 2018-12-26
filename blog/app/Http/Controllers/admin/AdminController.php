<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Admin;
use App\Http\Requests\AdminStore;
use App\Http\Requests\AdminEdit;
use Hash;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $uname = $request->input('uname','');
        $auth = $request->input('auth','_');
        $condition[] = ['uname','like','%'.$uname.'%'];
        $condition[] = ['auth','like',$auth];
        $admins = Admin::where($condition)->paginate(3);
        return view('admin/admin/index',['title'=>'管理员列表','params'=>$params,'admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/admin/create',['title'=>'管理员添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminStore $request)
    {
        $admin = new Admin;
        $admin->uname = $request->uname;
        $admin->pwd = Hash::make($request->pwd);
        $admin->sex = $request->sex;
        $admin->tel = $request->tel;
        $admin->email = $request->email;
        $admin->auth = $request->auth;
        if($request->hasFile('face')){
            $admin->face = '/uploads/'.$request->file('face')->store('images');
        }
        $res = $admin->save();
        if($res){
            return redirect('/admin/admin')->with('success','添加成功');
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
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin/admin/edit',['title'=>'管理员修改','admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminEdit $request, $id)
    {
        $admin = Admin::find($id);
        $admin->sex = $request->sex;
        $admin->tel = $request->tel;
        $admin->email = $request->email;
        $admin->auth = $request->auth;
        if($request->hasFile('face')){
            $admin->face = '/uploads/'.$request->file('face')->store('images');
        }
        $res = $admin->save();
        if($res){
            // if(session('admin')->id == $admin->id){
            //     session(['admin',$admin]);
            // }
            return redirect('/admin/admin')->with('success','修改成功');
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
    public function destroy($id)
    {
        $admin = Admin::find($id);
        if($admin->face){
        $res = Storage::delete(ltrim($admin->face,'/uploads/'));
     }
        $res = $admin->delete();
        if($res){
            echo 'success';
        }else{
            echo 'error';
        }
    }
}
