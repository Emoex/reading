<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Article;
use App\models\ArticleCate;
use App\models\User;
use App\Http\Requests\ArticleStore;
use App\Http\Requests\ArticleEdit;
use Illuminate\Support\Facades\Storage;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  $params = $request->all();
       $title = $request->input('title','');
       $cid = $request->input('cid','%');
       $condition[] = ['title','like','%'.$title.'%'];
       $condition[] = ['cid','like',$cid];
       $articles = Article::where($condition)->paginate(5);
       $cates = ArticleCate::get(); 
       return view('admin/article/index',['params'=>$params,'title'=>'文章列表','articles'=>$articles,'cates'=>$cates]);
    }

    /**
     * Show the form for creating a new resource.7
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = ArticleCate::get();
        $user = User::get(); 
        return view('admin/article/create',['title'=>'文章添加','cate'=>$cate,'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleStore $request)
    {
        $article = new Article;
        $article->cid = $request->cate;
        $article->uid = $request->uid;
        $article->title = $request->title;
        $article->content = $request->content;
        if($request->hasFile('image')){
            $article->image = '/uploads/'.$request->file('image')->store('images');
        }
        $res = $article->save();
        if($res){
            return redirect('/admin/article')->with('success','添加成功');
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
        $article = Article::find($id);
        $data['title'] = $article->title;
        $data['content'] = $article->content;
        if(!empty($data)){
            $data['msg'] = 'success';
            echo json_encode($data);
        }else{
            $data['msg'] = 'error';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $cate = ArticleCate::get(); 
        $user = User::get(); 
        return view('/admin/article/edit',['title'=>'文章修改','article'=>$article,'cate'=>$cate,'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleEdit $request, $id)
    {
        $article = Article::find($id);
        $article->cid = $request->cate;
        $article->uid = $request->uid;
        $article->title = $request->title;
        $article->content = $request->content;
        if($request->hasFile('image')){
            $article->image = '/uploads/'.$request->file('image')->store('images');
        }
        $res = $article->save();
        if($res){
            return redirect('/admin/article')->with('success','修改成功');
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
        $article = Article::find($id);
        if($article->image){
        $res = Storage::delete(ltrim($article->image,'/uploads/'));
     }
        $res = $article->delete();
        if($res){
            echo 'success';
        }else{
            echo 'error';
        }
    }
}
