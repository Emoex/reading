@extends('home/layout/index')
@section('content')
<div class="container">
<form action="/home/userinfo/setPassword" method="post">
  {{csrf_field()}}
  <div class="set-cpt">
    
    <div class="login-warn">
    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
     @endforeach 
   @endif
   @if (session('error'))
		  <p>{{ session('error') }}</p> 
  @endif
    </div>
    

    <div class="set-title set-title-chengepwd">修改密码</div>
    <div class="login-input">
      <input type="password" placeholder="输入旧密码" name="oldPwd" value="{{ old('oldPwd') }}"></div>
    <div class="login-input">
      <input type="password" placeholder="新密码" name="newPwd" value="{{ old('newPwd') }}"></div>
    <div class="login-input">
      <input type="password" placeholder="确认密码" name="renewPwd" value="{{ old('renewPwd') }}"></div>
    <label><div class="btn">
	  <input type="submit" value="修改">
    </div></label>
  </div>
</form>
</div>
<style>
   .set-cpt {
    position: absolute;
    width: 500px;
    height: 409px;
    margin: 0 auto;
    top: 50%;
    margin-top: -218.5px;
    left: 50%;
    margin-left: -250px;
    background-color: #fff;
    border: 1px solid #e8e8e8;
    -ms-border-radius: 7px;
    -webkit-border-radius: 7px;
    -moz-border-radius: 7px;
    border-radius: 7px;
}
.set-cpt .btn {
    width: 100px;
    line-height: 36px;
    text-align: center;
    margin: 0 auto;
    font-size: 14px;
    margin-top: 34px;

}
.set-cpt .btn input{
	font-size: 14px;
	outline:medium;
	background:none;
	border:none;
	cursor:pointer;
}
.set-title-chengepwd {
    padding-top: 52px;
}
.set-title {
    padding-top: 72px;
    padding-bottom: 37px;
    font-size: 30px;
    color: #333;
    text-align: center;
}
.login-warn p{
	color:rgb(232,111,111);
}
</style>
@endsection