<!DOCTYPE html>
<html lang="en">
 <head> 
  <meta charset="UTF-8" /> 
  <meta type="" /> 
  <title>片刻网-用文字交换世界</title> 
  <link href="https://qnstatic.pianke.me/public/assets/favicon.ico" rel="icon" type="image/x-icon" /> 
  <link rel="stylesheet" href="/css/index.css" /> 
  <link rel="stylesheet" href="/css/client.css" /> 
  <link href="https://qnstatic.pianke.me/public/assets/favicon.ico" rel="icon" type="image/x-icon" /> 
  <link rel="stylesheet" href="/css/feed.css" /> 
  <link rel="stylesheet" href="/css/radio.css" /> 
  <link rel="stylesheet" href="/css/read.css" /> 
  <link rel="stylesheet" href="/css/timeline.css" /> 
  <link rel="stylesheet" href="/assets/css/user.css">
  <link rel="stylesheet" href="/css/userSet.css">
  <script src="/assets/js/wsdk.js" charset="utf-8"></script>
  <script src="/js/radio.js"></script>  
  <!-- <script src="js/wsdk.js" charset="utf-8"></script>  -->

  <script src="/js/client.js"></script>  
   
  <script src="/js/tingInfo.js"></script>

  <link href="https://qnstatic.pianke.me/public/assets/favicon.ico" rel="icon" type="image/x-icon" /> 
  <link rel="stylesheet" href="https://qnstatic.pianke.me/public/assets/css/radio.css" /> 
  <script src="https://g.alicdn.com/aliww/h5.imsdk/2.1.5/scripts/yw/wsdk.js" charset="utf-8"></script> 

 </head> 
 <body> 
  <div pause-scroll-trigger="true" style="height: 100%" class="m-index-container">
   <div>
    <div class="login" style="display: none;">
     <div class="close-login-box"></div> 
     <div class="login-box">
      <div class="pianke-text">
       世界很美, 而你正好有空
      </div> 
      <div class="type-title-cpt">
       <span class="active">登录</span> 
       <span class="">注册</span>
      </div> 
      <div class="login-content">
       <div class="login-warn"></div> 
       <div class="login-input">
        <input type="text" placeholder="输入邮箱或手机号" />
       </div> 
       <div class="login-input">
        <input type="password" placeholder="密码" />
       </div> 
       <div class="forget-psw">
        <a href="../../pages/set/getCaptcha.html?type=2">忘记密码?</a>
       </div> 
       <div class="login-btn">
        登录
       </div>
      </div> 
      <div class="register-content" style="display: none;">
       <img src="http://qnstatic.pianke.me/public/assets/img/pianke-code.png" />
      </div> 
     </div>
    </div> 
    <header class="" style="">
     <div class="head">
      <div class="head-logo">
       <a href=""></a>
      </div> 
      <ul class="navbar">
       <li class=""><a href="/home/layout/index">首页</a></li> 
       <li class="active"><a href="/home/article">阅读</a></li> 
       <li class=""><a href="/home/ting/radio">电台</a></li> 
       <li class=""><a href="/home/timeline/timeline">碎片</a></li> 
       <li class=""><a href="/home/feed/feed">动态</a></li> 
       <li class=""><a href="/home/client/client">客户端</a></li>
      </ul> 
      <div class="navbar-icon">
          <a href="/home/ting/create">
         <div class="editer">
          <div>
          <img src="http://qnstatic.pianke.me/public/assets/img/edit-icon.png" width="19px" height="20px" />         
          </div>
         </div> 
         </a> 
       <div class="massage">
        <div class="msg-icon">
         <img src="http://qnstatic.pianke.me/public/assets/img/msg.png" width="44px" /> 
         <div class="msgnum">
          4
         </div>
        </div> 
        <div class="msg-menu">
         <div class="drop-menu msg-drop">
          <ul>
           <li><a href="../../pages/user/user.html?uid=4764921&amp;msgType=0">评论 <span>0</span></a></li> 
           <li><a href="../../pages/user/user.html?uid=4764921&amp;msgType=1">喜欢 <span>1</span></a></li> 
           <li><a href="../../pages/user/user.html?uid=4764921&amp;msgType=2">粉丝 <span>0</span></a></li> 
           <li><a href="../../pages/user/user.html?uid=4764921&amp;msgType=3">片邮 <span>3</span></a></li>
          </ul>
         </div>
        </div>
       </div> 
       <div class="userinfo">
        <a href="../../pages/user/user.html?uid=4764921">  @if(session('user'))<img src="{{ session('user')['face'] }}" alt="" class="user-icon"> @else <img src="/face.png" alt="" class="user-icon"> @endif </a> 
        <div class="msg-menu">
         <div class="drop-menu userinfo-drop">
          <ul>
           <li><a href="../../pages/set/userSet.html">账号设置</a></li> 
           <li><a href="/home/logout">退出</a></li>
          </ul>
         </div>
        </div>
       </div> 
       <div class="login-btn hidden">
        <div>
         登录&nbsp;
         <span>/</span>&nbsp;注册
        </div>
       </div>
      </div>
     </div>
    </header>
   </div> 
   @section('content')

   @show
   <div class="back-top"></div> 
   <footer>
    <div class="foot">
     <div class="foot-logo"></div> 
     <div class="foot-link">
      <span><a href="http://old.pianke.me/public/aboutus.php" target="_blank">关于我们</a> <a href="http://old.pianke.me/public/link.php" target="_blank">友情链接</a> <a href="http://old.pianke.me/public/help.php" target="_blank">片刻帮助</a> <a href="http://old.pianke.me/public/feedback.php" target="_blank">意见反馈</a> <a href="http://old.pianke.me/album/52a83abd7f8b9ab50d00000d" target="_blank">成长记忆</a><br /></span> 
      <span>All rights reserved &copy; 2016 pianke.me /黔ICP备17008875号-1</span>
     </div> 
     <div class="foot-icon">
      <div class="foot-app">
       <a href="../../pages/client/client.html"></a>
      </div> 
      <div class="foot-weibo">
       <a href="http://weibo.com/u/2848708205" target="_blank"></a>
      </div> 
      <div class="foot-wechat">
       <div></div>
      </div> 
      <div class="foot-safe">
       <a target="_blank" href="http://v.pinpaibao.com.cn/authenticate/cert/?site=pianke.me&amp;at=business"></a>
      </div>
     </div>
    </div>
   </footer>
  </div> 

   <script src="/js/upfile.js"></script> 
  <script src="/js/timeline.js"></script> 
 </body>
</html>