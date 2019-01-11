<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\ArticleComment;
class ArticleCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new ArticleComment;
        $comment->aid = $request->aid;
        $comment->uid = session('user')['id'];
        $comment->content = $request->content;
        $comment->parent_id = $request->parent_id;
        $comment->like = 0;
        $res = $comment->save();
        $arr = [];
        if($res){
            $arr['uname'] = $comment->User->uname;
            $arr['face'] = $comment->User->face;
            $arr['time'] = $comment->created_at->format('Y-m-d H:i:s');
            $arr['like'] = $comment->like;
            $arr['content'] = $comment->content;
            $arr['msg'] = 'success';
        }else{
            $arr['msg'] = 'error';
        }
        echo json_encode($arr);
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
}
