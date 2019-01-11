<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ting;
use App\Models\TingCate;
use App\Models\TingComment;
use DB;
use App\Models\User;
use App\Models\Article;


class TingController extends Controller
{
    static protected function getComment($aid = 0,$parent_id = 0,&$result = array())
    {       
        $arr = TingComment::where('parent_id',$parent_id)->orderBy('created_at', 'desc')->get();  
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
        $ting=Ting::all();
        $listen=DB::select('select * from ting order by listen desc limit 3');
        $tingid=DB::select('select * from ting order by id desc limit 3');
        $like=DB::select('select * from ting order by likes desc limit 3');
        $cate=TingCate::all();
        return view('/home/ting/redio',['ting'=>$ting,'cate'=>$cate,'listen'=>$listen,'tingid'=>$tingid,'like'=>$like]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate=TingCate::all();
        $user=User::all();
        return view('/home/ting/editor',['cate'=>$cate,'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ting=new Ting;
        $req=$request->except(['_token']);
        $user=User::where('uname',$req['username'])->first();
        $article=Article::where('uid',$user->id)->where('title',$req['title1'])->first();

        if($request->hasFile('file')){
            $path = $request->file('file')->store('music');
            $ting->music='/uploads/'.$path;
        }
        if($request->hasFile('img')){
            $img = $request->file('img')->store('images');
            $ting->img='/uploads/'.$img;
        }
        $ting->title=$req['title'];
        $ting->cid=$req['cate'];
        $ting->aid=$article->id;
        $ting->tname=$user->nickname;
        $res=$ting->save();

        if($res){
            DB::commit();  //提交事务
            return redirect('/home/ting');
        }else{
            DB::rollBack();
            return redirect('/home/ting');
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

        $info=Ting::find($id);
        $comment=static::getComment();
        $num = TingComment::count();
        $article=Article::where('id',$info->aid)->first();
        return view('/home/ting/tinginfo',['info'=>$info,'article'=>$article,'comment'=>$comment,'num'=>$num]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $cate=TingCate::find($id);
        $ting=Ting::where('cid',$id)->offset(0)->limit(6)->get();
        $tcate=TingCate::all();
        return view('/home/ting/redioType',['cate'=>$cate,'ting'=>$ting,'tcate'=>$tcate]);
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

    public function tingArticle(Request $request)
    {
        $uname=$request->username;
        $title=$request->title1;
        $user=User::where('uname',$uname)->first();
        if(!$user){
            echo 'error';exit;
        }
        $article=Article::where('uid',$user->id)->where('title',$title)->first();
        if(!$article){
            echo 'error';exit;
        }
        echo 'success';
    }

    public function pinterest(Request $request)
    {
        $p=$request->p;
        $num=$request->num;
        $id=$request->cid;
        $ting=Ting::where('cid',$id)->offset(($p-1)*$num)->limit($num)->get();
        if($ting){
            echo json_encode($ting);
        }else{
            echo json_encode(['msg'=>'error']);
        }
    }
}

