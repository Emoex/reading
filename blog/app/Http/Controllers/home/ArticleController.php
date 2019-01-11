<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\ArticleCate;
use App\models\Article;
use DB;
use App\models\ArticleComment;
use App\models\User;
class ArticleController extends Controller
{
    
    static protected function getComment($parent_id = 0,&$result = array())
    {       
        $arr = ArticleComment::where('parent_id',$parent_id)->orderBy('created_at', 'desc')->get();  
        if(empty($arr)){
            return array();
        }
        foreach ($arr as $value) {  
            $thisArr = &$result[];
            $value["children"] = static::getComment($value["id"],$thisArr);    
            $thisArr = $value;                                    
        }
        return $result;
   }
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = ArticleCate::get();
        $article = Article::orderBy('look','desc')->paginate(3);
        
        return view('home/article/index',['cate'=>$cate,'article'=>$article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::all();
        return view('/home/article/editor',['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $comment = static::getComment();
        $num = ArticleComment::count();
        return view('home/article/article',['article'=>$article,'comment'=>$comment,'num'=>$num]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function showCate($id)
    {
        $cate = ArticleCate::find($id);
        $article = Article::where('cid',$id)->get();
        return view('home/article/cate',['cate'=>$cate,'article'=>$article]);
    }
}
