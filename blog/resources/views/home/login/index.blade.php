<!DOCTYPE html>
<html lang="en">
 <head> 
  <meta charset="UTF-8" /> 
  <title></title> 
  <link rel="stylesheet" href="/css/index.css" /> 
  <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
  <!-- <script src="js/wsdk.js" charset="utf-8"></script>  --> 
 </head> 
 <body> 
  <div class="login" style=""> 
   <a href="/home/index"><div class="close-login-box"></div></a> 
   <div class="login-box"> 
    <div class="pianke-text"> 
     <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">世界很美，而你正好有空</font></font> 
    </div> 
    <div class="type-title-cpt"> 
     <span class="active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">登录</font></font></span> 
     <span class=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">注册</font></font></span> 
    </div> 

    @if (session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert" style="background:#fff;border:0px;margin-bottom:-8px;width:200px;margin-left:200px;font-size:12px;">
                <strong>{{ session('error') }}</strong> 
              </div>
    @endif

   @if (count($errors) > 0)
    <div class="alert alert-danger" style="background:#fff;border:0px;margin-bottom:-8px;width:100px;margin-left:220px;font-size:12px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach  
        </ul>
    </div>
   @endif  
    <div class="login-content" style="display: block;"> 
     <div class="login-warn"></div> 
     <form action="/home/doLogin" method="post">
     {{ csrf_field() }}
     <div class="login-input"> 
      <input type="text" name="uname" placeholder="输入用户名" /> 
     </div> 
     <div class="login-input"> 
      <input type="password" name="pwd" placeholder="密码" /> 
     </div> 
     <div class="forget-psw"> 
      <a href="../../pages/set/getCaptcha.html?type=2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">忘记密码？</font></font></a> 
     </div> 
     <label>
     <div class="login-btn"> 
      <font style="vertical-align: inherit;"><input type="submit" value="登录" style="outline:medium;display:inline-block;background:none;border:none;cursor:pointer;"></font>
     </div> 
     </label>
     </form>
    </div> 

    
    <div class="login-content" style="display: none;"> 
      <form action="/home/login" method="post">
     {{ csrf_field() }}
     <div class="login-input" style="margin-top:-20px;"> 
       <label for=""><span style="font-size:12px;">用户名</span><input type="text"  name="uname" placeholder="4-10位字母开头字母数字组合" style="width:150px;"/> </label>
       <span class="info"></span>
     </div> 
     <div class="login-input" style="margin-top:-10px;"> 
       <label for=""><span style="font-size:12px;">手机号</span><input type="text" id="tel" name="tel" placeholder="请输入手机号" style="width:150px;"/> </label>
       <span class="info"></span>
     </div> 
     <div class="login-input" style="margin-top:-10px;"> 
      <label for=""><span style="font-size:12px;">密　码</span><input type="password" placeholder="6-15位字母数字下划线" name="pwd" style="width:150px;" /></label>
      <span class="info"></span>
     </div> 
     <div class="login-input" style="margin-top:-10px;"> 
      <label for=""><span style="font-size:12px;">验证码</span><input type="name" placeholder="验证码" name="code" style="width:80px;" /></label>
      <input type="button" style="width:100px;background:#eee;text-align:center;line-height:30px;font-size:14px;" id="yzm" value="获取" disabled="disabled">
      <span class="info"></span>
     </div> 
     <div style="clear:both"></div>
     <label>
     <div class="login-btn"> 
      <font style="vertical-align: inherit;"><input type="submit" id="register" value="注册" style="outline:medium;display:inline-block;background:none;border:none;cursor:pointer;"></font>
     </div> 
     </label>
     </div> 
     </form>
         </div> 


   </div> 
  </div>  
  <style>
         input::-webkit-input-placeholder {
        /* placeholder字体大小  */
         font-size: 8px;
     }
        .info{
          font-size: 5px;
        }
  </style>
  <script>
        $('.type-title-cpt span').click(function(){
            $('.type-title-cpt span').removeClass('active');
            $(this).addClass('active');
            var index = $(this).index();
            $('.login-content').css('display','none');
            $('.login-content').eq(index).css('display','block');
        })




        $(document).ready(function(){
         var isuname,ispwd,iscode = false;

          var uname = $("input[name='uname']").eq(0);
          var pwd = $("input[name='pwd']");
          var code = $("input[name='code']");

          uname.keyup(function(){
            var uname = $(this).val();
            // var uname_preg = /^[a-zA-Z\d\u4e00-\u9fa5]{4,10}$/;
            var uname_preg = /^[a-zA-Z]{1}[a-zA-Z\d]{3,9}$/;
            if(uname_preg.test(uname)){
              $('.info').eq(0).html('用户名格式正确');
              isuname = true;
            }else{
              $('.info').eq(0).html('用户名格式不正确');
            }
          });
         
         pwd.keyup(function(){
            var pwd = $(this).val();
            var pwd_preg = /^[\w]{6,15}$/;

            var arr = [];
            var number_preg = /[0-9]+/g;
            if(number_preg.test(pwd)){
              arr.push('数字');
            }

            var small_str_preg = /[a-z]+/g;
            if(small_str_preg.test(pwd)){
              arr.push('小写字母');
            }
            var big_str_preg = /[A-Z]+/g;
            if(big_str_preg.test(pwd)){
              arr.push('大写字母');
            }

            if(pwd_preg.test(pwd)){
              var str = '';
              switch(arr.length){
                case 1:str = '弱';break;
                case 2:str = '中';break;
                case 3:str = '强';
              }
              $('.info').eq(2).html('密码格式正确  '+str);
              ispwd = true;
            }else{
              $('.info').eq(2).html('密码格式不正确');
            }
          });

          var ordertime=60;  
          var timeleft=ordertime;
          var btn=$("#yzm");
          var tel=$("#tel");
          var reg = /^1[0-9]{10}$/;  
          tel.keyup(function(){
            if (reg.test(tel.val())){
              $('.info').eq(1).html('手机号格式正确');
              btn.removeAttr("disabled");  
              btn.click(function(){
                $.get('/home/login/code',{'tel':tel.val()},function(msg){
                  console.log(msg);
              },'json');

              })
              }
            else{
              $('.info').eq(1).html('手机号格式不正确');
              btn.attr("disabled",true);
            }
          })
          $('#register').click(function(){
            if(code.val()){
            iscode = true;
          }
            if(isuname && ispwd){
              return true;
            }else{
              return false;
            }
          })

          //计时函数
          function timeCount(){
             timeleft-=1;
             if (timeleft>0){
             btn.val(timeleft+" 秒后重发");
             setTimeout(timeCount,1000);
             }
             else {
              btn.val("重新发送");
              timeleft=ordertime;   
              btn.removeAttr("disabled");
             }
           }

          //事件处理函数
          btn.on("click",function(){
              $(this).attr("disabled",true); 
              timeCount(this);
              })

      })
  </script>
 </body>
</html>