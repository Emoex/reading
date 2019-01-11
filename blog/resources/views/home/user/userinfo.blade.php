@extends('home/layout/index')
@section('content')
<div class="user-set-content">
  <div class="type-title-cpt">
    <span class="active">帐号设置</span></div>
  <form action="/home/userinfo/1" method="post" enctype="mulitipart/form-data">
  {{ csrf_field() }}
  {{ method_field('PUT') }}
  <div class="set-content">
    <div class="user-set">
      <div class="set-icon">
        <div>
          <span class="set-text">头像:</span>
          <label>@if(session('user')['face'])<img src="{{ session('user')['face'] }}" title="点击更换头像"> @else <img src="/face.png" alt="" > @endif <input type="file" style="display:none;" name="face"> </label></div>
      </div>
      <div class="set-name" style="">
        <span class="set-text">昵称:</span>
        <input type="text" placeholder="请输入用户昵称" maxlength="30" value="{{ session('user')['nickname'] }}" name="nickname">
        <span class="set-warn-text">4-30个字符,中英文均可</span></div>
      <div>
        <span class="set-text">密码:</span>
        <span class="set-point-text">
          <a href="/home/userinfo/showSetPassword">修改</a></span>
      </div>
      <div class="set-sex">
        <span class="set-text">性别:</span>
        <label class="radiovote">
           <input type="radio" name="sex" value="男">
          <span class="voteContent">男</span>
           <img src="@if(session('user')['sex'] == '男') /images/radioY.png @else /images/radioN.png @endif " alt="" style="width:20px;height:20px;"> 
        </label>
        <label class="radiovote">
          <input type="radio" name="sex" value="女">
          <span class="voteContent">女</span>
          <img src="@if(session('user')['sex'] == '女') /images/radioY.png @else /images/radioN.png @endif " alt="" style="width:20px;height:20px;"> 
        </label>
      </div>
      <div class="set-des">
        <span class="set-text">简介:</span>
        <textarea placeholder="请输入简介,36个字以内。" name="intro" maxlength="36">{{ session('user')['intro'] }}</textarea>
      </div>
      <label>
          <div class="btn set-btn">
            <input type="submit" value="修改">
          </div>
      </label>
  </div>
  </form>
</div>

<style>
      .voteContent img{
         width: 20px;
         height:20px;
      }
      .btn input{
        font-size: 14px;
        outline:medium;
        background:none;
        border:none;
        cursor:pointer;
      }
</style>

<script>
      $(function(){
          $('.radiovote input:radio').change(function(){
                   $('.radiovote img').attr('src','/images/radioN.png');
                   $(this).next().next().attr('src','/images/radioY.png');
                })
    })
      
</script>
@endsection