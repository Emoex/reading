@extends('home/layout/index')
@section
<div class="user-set-content">
  <div class="type-title-cpt">
    <span class="active">帐号设置</span></div>
  <div class="set-content">
    <div class="user-set">
      <div class="set-icon">
        <div>
          <span class="set-text">头像:</span>
          <img src="http://qnstatic.pianke.me/public/assets/img/user-default-img.png"></div>
        <div class="change-icon">
          <span class="set-point-text" style="display: none;">修改</span>
          <span class="set-point-text">上传头像</span>
          <input type="text"></div>
      </div>
      <div class="set-name">
        <span class="set-text">昵称:</span>
        <input type="text" placeholder="请输入用户昵称" maxlength="30">
        <span class="set-warn-text">4-30个字符,中英文均可</span></div>
      <div>
        <span class="set-text">手机号:</span>13643445203
        <span class="set-point-text" style="">
          <a href="./getCaptcha.html?type=1&amp;status=0">修改</a></span>
        <span class="set-point-text" style="display: none;">
          <a href="./getCaptcha.html?type=1&amp;status=1">绑定手机号</a></span>
      </div>
      <div>
        <span class="set-text">密码:</span>
        <span class="set-point-text">
          <a href="./changepwd.html">修改</a></span>
      </div>
      <div class="set-sex">
        <span class="set-text">性别:</span>
        <label class="radiovote">
          <span class="voteContent">男</span>
          <input type="radio" name="a" value="1">
          <i class="voteImg"></i>
          <i class="votedImg"></i>
        </label>
        <label class="radiovote">
          <span class="voteContent">女</span>
          <input type="radio" name="a" value="2">
          <i class="voteImg"></i>
          <i class="votedImg"></i>
        </label>
      </div>
      <div class="set-des">
        <span class="set-text">简介:</span>
        <textarea name="" placeholder="请输入简介" maxlength="36"></textarea>
      </div>
      <div class="btn set-btn">保存设置</div></div>
  </div>
</div>
@endsection