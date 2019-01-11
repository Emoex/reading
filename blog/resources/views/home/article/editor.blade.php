<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <title>片刻</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://qnstatic.pianke.me/editor/assets/favicon.ico" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="https://qnstatic.pianke.me/editor/assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://qnstatic.pianke.me/editor/assets/css/bootbox.css">
    <link rel="stylesheet" href="https://qnstatic.pianke.me/editor/assets/css/cropper.css">
     <!-- <link rel="stylesheet" href="https://qnstatic.pianke.me/editor/assets/css/style.css?v=36"> -->
     <link rel="stylesheet" href="/css/text.css">
    <script src="https://qnstatic.pianke.me/editor/assets/js/jquery.min.js"></script>
    <script src="https://qnstatic.pianke.me/editor/assets/js/md5.js"></script>
    <script src="https://qnstatic.pianke.me/editor/assets/js/jquery.base64.js"></script>
    <script src="https://qnstatic.pianke.me/editor/assets/js/common.js?v=37"></script>
    <script src="https://qnstatic.pianke.me/editor/assets/js/cropper.js"></script>
    <script src="https://qnstatic.pianke.me/editor/assets/js/qiniu.js?v=37"></script>
    <script type="text/javascript" charset="utf-8" async="" src="https://qnstatic.pianke.me/editor/editorBuild/0.build.js"></script>
    <script src="https://qnstatic.pianke.me/editor/assets/php/lang/zh-cn/zh-cn.js" type="text/javascript" defer="defer"></script>
    <link href="https://qnstatic.pianke.me/editor/assets/php/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" defer="defer" src="https://qnstatic.pianke.me/editor/assets/php/php/controller.php?action=config&amp;callback=bd__editor__rltc25"></script>
    <script src="https://qnstatic.pianke.me/editor/assets/php/third-party/codemirror/codemirror.js" type="text/javascript" defer="defer"></script>
    <link rel="stylesheet" type="text/css" href="https://qnstatic.pianke.me/editor/assets/php/third-party/codemirror/codemirror.css">
    <script src="https://qnstatic.pianke.me/editor/assets/php/third-party/zeroclipboard/ZeroClipboard.js" type="text/javascript" defer="defer"></script>
  </head>
  <body style="">
   <div class="menuBar hidden-xs" style="margin-top:-35px;"> 
   <div class="logo"> 
    <a href="/home/index"> <img width="18px" src="http://pianke.image.alimmdn.com/webUeditor/assets/img/logo.png" /></a> 
   </div> 
   <div class="menuItem"> 
    <a href="/home/article/create" class="active">文章</a> 
    <a href="/home/ting/create">Ting</a> 
    <a href="#!/rootEdit" style="display: none;">管理</a>
   </div> 
   <div class="userInfo hidden-xs-hg"> 
    <div class="userIcon"> 
     <a href="/home/personal/{{ session('user')['id'] }}"> <img class="userIconWH" src="{{ session('user')['face'] }}" /></a> 
    </div> 
    <hr /> 
    <div class="dropdown dropup"> 
     <a href="" class="dropdown-toggle" data-toggle="dropdown">账号</a> 
     <ul class="dropdown-menu dropMenu"> 
      <li> <a href="/home/userinfo">账号设置</a> <a href="http://tweb.pianke.me/pages/user/user.html?uid=500129&amp;msgType=0">消息中心</a> <a href="/home/index">返回</a></li> 
     </ul> 
    </div> 
   </div> 
  </div> 
  <!-- 发表 --> 
  <div class="articlecontent" style="padding-left: 65px;padding-right:30px"> 
   <div class="text-center pull-right ueditoButton"> 
    <span style="background-color:#5BAD6B;border: 0px;color:#fff;margin-left:30px;">立即发布</span> 
   </div> 
   <div class="articleTitle"> 
    <div> 
     <input type="text" maxlength="30" placeholder="请输入标题" style="font-size:30px;font-weight:lighter;margin-left:-10px;color:#333"/> 
    </div> 
    <div class="titleWord text-center pull-right"> 
     <span>7</span>/30 
    </div> 
   </div> 
   <hr class="articleTitleHr" /> 
   <div class="articleType"> 
    <div class="dropdown dropdownType" style="margin-right:30px;"> 
     <a href="" class="dropdown-toggle" data-toggle="dropdown" style="color:#999;"> <span>选择分类</span> <img width="11px" src="http://pianke.image.alimmdn.com/webUeditor/assets/img/downpoint.png" /> </a> 
     <ul class="dropdown-menu dropMenuDownpoint"> 
      <li class="tagLi"> <a>早安故事</a> </li> 
     </ul> 
    </div> 
   </div> 
   <!-- 发表结束 --> 
   <div style="padding-left: 65px;"> 
    <script id="container" name="content" type="text/plain" style="height:400px">
    </script> 
   </div> 
   <script src="https://qnstatic.pianke.me/editor/editorBuild/common.js?v=37"></script> 
   <script src="https://qnstatic.pianke.me/editor/editorBuild/build.js?v=37"></script> 
   <script src="https://qnstatic.pianke.me/editor/assets/js/bootstrap.min.js"></script> 
   <script src="https://qnstatic.pianke.meeditor/assets/js/bootbox.js"></script> 
   <div id="edui_fixedlayer" class="edui-default" style="position: fixed; left: 0px; top: 0px; width: 0px; height: 0px;"> 
    <div id="edui2" class="edui-popup  edui-bubble edui-default" onmousedown="return false;" style="display: none;"> 
     <div id="edui2_body" class="edui-popup-body edui-default"> 
      <iframe style="position:absolute;z-index:-1;left:0;top:0;background-color: transparent;" frameborder="0" width="100%" height="100%" src="about:blank" class="edui-default"></iframe> 
      <div class="edui-shadow edui-default"></div> 
      <div id="edui2_content" class="edui-popup-content edui-default"></div> 
     </div> 
    </div> 
   </div>
  </div>
        <!-- 配置文件 -->
    <script type="text/javascript" src="/utf8/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/utf8/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{toolbars: [['bold','fullscreen', 'source', 'undo', 'redo','simpleupload','underline','strikethrough','fontfamily','fontsize','justifyleft', 'justifyright','justifycenter','justifyjustify','forecolor','autotypeset']]});
    </script>
  </body>

</html>