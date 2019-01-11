<html lang="en">
 <head> 
  <meta charset="UTF-8" /> 
  <title>片刻</title> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
  <link href="https://qnstatic.pianke.me/editor/assets/favicon.ico" rel="icon" type="image/x-icon" /> 
  <link rel="stylesheet" href="/css/common.css">
  <link rel="stylesheet" href="https://qnstatic.pianke.me/editor/assets/css/bootstrap.css" /> 
  <link rel="stylesheet" href="https://qnstatic.pianke.me/editor/assets/css/bootbox.css" /> 
  <link rel="stylesheet" href="https://qnstatic.pianke.me/editor/assets/css/cropper.css" /> 
  <link rel="stylesheet" href="https://qnstatic.pianke.me/editor/assets/css/style.css?v=36" /> 
  <script src="https://qnstatic.pianke.me/editor/assets/js/jquery.min.js"></script> 
  <script src="https://qnstatic.pianke.me/editor/assets/js/md5.js"></script> 
  <script src="https://qnstatic.pianke.me/editor/assets/js/jquery.base64.js"></script> 
  <script src="https://qnstatic.pianke.me/editor/assets/js/common.js?v=37"></script> 
  <script src="https://qnstatic.pianke.me/editor/assets/js/cropper.js"></script> 
  <script src="https://qnstatic.pianke.me/editor/assets/php/ueditor.config.js"></script> 
  <script src="https://qnstatic.pianke.me/editor/assets/php/ueditor.all.js"></script> 
  <script src="https://qnstatic.pianke.me/editor/assets/js/qiniu.js?v=37"></script> 
  <script type="text/javascript" charset="utf-8" async="" src="https://qnstatic.pianke.me/editor/editorBuild/2.build.js"></script>
 </head> 
 <body style=""> 
  <div class="menuBar hidden-xs"> 
   <div class="logo">
    <a href="/home/index"><img width="18px" src="http://pianke.image.alimmdn.com/webUeditor/assets/img/logo.png" /></a>
   </div> 
   <div class="menuItem"> 
    <a href="/home/article/create">文章</a> 
    <a href="/home/ting/create" class="v-link-active active">Ting</a> 
    <a href="#!/rootEdit" style="display: none;">管理</a> 
   </div> 
   <div class="userInfo hidden-xs-hg"> 
    <div class="userIcon"> 
     <a href="/home/personal/{{ session('user')['id'] }}"> <img class="userIconWH" src="{{ session('user')['face'] }}" /> </a> 
    </div> 
    <hr /> 
    <div class="dropdown dropup"> 
     <a href="" class="dropdown-toggle" data-toggle="dropdown">账号</a> 
     <ul class="dropdown-menu dropMenu"> 
      <li> <a href="/home/userinfo">账号设置</a> <a href="http://tweb.pianke.me/pages/user/user.html?uid=500129&amp;msgType=0">消息中心</a> <a href="/home/index">返回</a> </li> 
     </ul> 
    </div> 
   </div> 
  </div> 

<!-- 发表电台 -->
  <form action="/home/ting" method="post" enctype="multipart/form-data" id='form' onsubmit="return false;">
  {{ csrf_field() }}
  <div class="container-bg"> 
   <div class="container" style=" background-color:#fff;"> 
    <div class="row" style="margin-top:0px;"> 
     <div class="col-sm-7" style="width:100%"> 
      <div class="logoDefault uhide">
       <img class="center-block" src="http://pianke.image.alimmdn.com/webUeditor/assets/img/logoDefault.png" />
      </div> 
      <div class="articlecontent" style="margin-top:-63px;"> 
       <div class="text-center ueditoButton pull-right" style="margin-top:0px;padding-top:0px;"> 
        <span class="preview">保存</span> 

        <input type="submit" value='提交' style="background-color:#5BAD6B;border: 0px;color:#fff;width:70px;height:39px;" id='submit'>
       </div> 
       <div class="articleTitle tingTitle" style="height:178px;"> 
        <div>
         <input type="text" name='title' maxlength="30"  value="" placeholder="请输入标题" style="font-size:30px;color:#333" />
        </div> 
       </div> 
       <hr class="tingTitleHr" /> 
       <div class="articleType tingType"> 
         
        <div class="dropdown dropdownType"> 
        <!--  <a href="" class="dropdown-toggle" data-toggle="dropdown" style="color:#999"> <span>选择分类</span> <img width="11px" src="http://pianke.image.alimmdn.com/webUeditor/assets/img/downpoint.png" /> </a> 
        <ul class="dropdown-menu dropMenuDownpoint dropMenuDownpointTing"> 
        @foreach($cate as $k=>$v)
         <li class="tagLi"> <a>{{ $v->name }}</a></li> 
         @endforeach
        </ul>  -->
        <select name="cate" class="dropdown-toggle" id="">
            @foreach($cate as $k=>$v)
            <option value="{{ $v->id }}">{{ $v->name }}</option>
            @endforeach
        </select>
        </div> 

       </div> 
       <div class="tingContent container" style="padding-top:0px;"> 
        <div class="row" > 
         <div class="col-xs-3 col-sm-3 leftCont"> 
          <label>              
              <input type="file" name='img' value="" class='img' style="display: none">
              <img src="http://pianke.image.alimmdn.com/webUeditor/assets/img/uploadImgD.png" class='ssrc'/>
          </label> 
          <script type="text/javascript">
              /*$('.img').change(function(){
                //C:\fakepath\41ac7977597008a42a70bd73afe5e9c120180805.jpg
                    var im=$(this).val();
                    var age=im.substr(12);
                    var image='/uploads/images/'+age;
                    $(this).next().attr('src',image);
                    
              });*/
          </script>
          <div class="uploadText">
           请上传封面, 建议尺寸640x640
          </div> 
          <div class="uploadText uploadTexttwo">
           宽:高 = 1:1
          </div> 
          <div class="btnUploadImg">
           编辑封面
          </div> 
         </div> 
         <div class="col-xs-9 col-sm-9 rightCont"> 
          <div class="btnUploadFile"> 
           <img class="addAudio" width="15px" src="http://pianke.image.alimmdn.com/webUeditor/assets/img/addAudio.png" /> 
           <input type="file" class="insertTing" value="" id="file1" name="file" /> 上传录制文件
           
          </div> 
          <div class="btnUploadFile2"> 
           <div style="text-overflow:ellipsis;overflow:hidden;margin:0 40px"> 
           </div> 
           <div> 
            <img class="addAudio" width="15px" src="http://pianke.image.alimmdn.com/webUeditor/assets/img/addAudio2.png" /> 
            <input type="file" class="insertTing2" id="file2" name="file1" /> 
           </div> 
          </div> 
          <div class="uploadFText">
           文件暂时只支持MP3, 单个文件请不要超过30M 
          </div> 
              <h3 style="color:#666">添加文章</h3>
              <span>用户名：</span><input type="text" name="username">
              <span>文章标题：</span><input type="text" name="title1">
              <br>
          <style type="text/css">
          </style>
          <div class="articleCon uhide"> 
           <div class="articleAuthor"> 
            <div>
             文: 
             <span class="author"></span>
            </div> 
            <div class="btnAuthor">
             替换文章链接
            </div> 
           </div> 
           <div class="contentHtml"> 
           </div> 
          </div> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> /home/tingArticle
  </div> 
  </form>
  {{ csrf_field() }}
     <!-- 提示框 -->
    <div ><div id="error" style="display:none;" class="errorPrompt Prompt"></div></div>
    <div><div id='success' style="display:none;" class="successPrompt Prompt"></div></div>   
    <!-- 确认框 -->
      <div class="Confirm hidden">
        <div>确认要举报吗？</div>
        <div class="btn-group" id="confirm">
          <div>取消</div>
          <div>确认</div></div>
      </div>
  <script>
      $(function(){
            if($('#undefined').val() == 'true'){
              error('未找到对应的文章');
            }

            //错误消息
             function error(text)
              {
                $('#error').text(text).show();
                setTimeout(function(){
                  $('#error').text('').hide();
                },2000);
              }

              $('#submit').click(function(){
                  $.post('/home/tingArticle',{'_token':$('input[name=_token]').val(),'username':$('input[name=username]').val(),'title1':$('input[name=title1]').val()},function(msg){
                      if(msg=='success'){
                        $('#form').attr('onsubmit','return true');
                          $('#form').submit();
                      }else{
                        error('没找到对应的文章');
                      }
                  },'html')
              })

             //成功消息
             function success(text)
              {
                $('#success').text(text).show();
                setTimeout(function(){
                  $('#success').text('').hide();
                },2000);
              }
                //确认框
            function confirm(text)
            {
              $('.Confirm').removeClass('hidden');
              $('.Confirm').find('div').eq(0).html(text);
              $('#confirm div').eq(0).click(function(){
                $('.Confirm').addClass('hidden');
              });
            } 
      })
  </script>
  <script src="https://qnstatic.pianke.me/editor/editorBuild/common.js?v=37"></script> 
  <script src="https://qnstatic.pianke.me/editor/editorBuild/build.js?v=37"></script> 
  <script src="https://qnstatic.pianke.me/editor/assets/js/bootstrap.min.js"></script> 
  <script src="https://qnstatic.pianke.me/editor/assets/js/bootbox.js"></script> 
 </body>
</html>