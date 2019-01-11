<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userinfo;
use Hash;
use App\Http\Requests\admin\Login;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('home/login/index');
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
        $user=new User;

        $user->uname=$request->uname;
        $user->pwd=Hash::make($request->pwd);
        $user->tel=$request->tel;
        $res=$user->save();

        $userinfo=new Userinfo;
        $userinfo->uid=$user->id;
        $res1=$userinfo->save();

        if($res && $res1){
            return redirect('/home/article')->with('success','注册成功');
        }else{
            return redirect('error','注册失败');
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

    public function sendMobileCode(Request $request)
    {
        //获取手机号
        $tel = $request->input('tel');
        $mobile_code = rand(1000,9999);
        session(['mobile_code'=>$mobile_code]);
        //短信接口地址
        $target = "http://106.ihuyi.com/webservice/sms.php?method=Submit&";
        $target .= "account=C07291094&password=862156b552ee08119081a574455a584a&mobile=".$tel."&format=json&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
        //请求接口 get/post
        //CURL 通过代码模拟浏览器请求
        $ch = curl_init();
        //设置选项，包括URL;
        curl_setopt($ch,CURLOPT_URL,$target);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        //执行并获取HTML文档内容；
        $res = curl_exec($ch);//发送
        //释放curl句柄
        curl_close($ch);
        //返回结果
        echo $res;
    }

    public function doLogin(Login $request)
    {
        $user = User::where('uname',$request->uname)->first();
        if($user){
            $pwd = $user->pwd;
            if(Hash::check($request->pwd,$pwd)){
                session(['user'=>$user]);
                return redirect('/home/article');
            }
        }
        return back()->with('error','用户名或者密码错误');
    }

    public function logout()
    {
        session(['user'=>'']);
        return redirect('/home/login');
    }
}
