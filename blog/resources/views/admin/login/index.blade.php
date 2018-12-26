<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Admin</title>
<link href="/Wopop_files/style_log.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/Wopop_files/style.css">
<link rel="stylesheet" type="text/css" href="/Wopop_files/userpanel.css">
<link rel="stylesheet" type="text/css" href="/Wopop_files/jquery.ui.all.css">
<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
</head>

<body class="login" mycollectionplug="bind">
<div class="login_m">
<div class="login_logo"><img src="/Wopop_files/logo.png" width="196" height="46"></div>
@if (session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ session('error') }}</strong> 
              </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger" style="background:#ccc;border:0px;margin-bottom:-8px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="login_boder">
<form action="/admin/doLogin" method="post">
{{ csrf_field() }}
<div class="login_padding" id="login_model">
  <h2>用户名</h2>
  <label>
    <input type="text" id="username" name="uname" class="txt_input txt_input2" onblur="if (value ==&#39;&#39;){value=&#39;Your name&#39;}" value="">
  </label>
  <h2>密码</h2>
  <label>
    <input type="password" name="pwd" id="userpwd" class="txt_input" onfocus="if (value ==&#39;******&#39;){value =&#39;&#39;}" onblur="if (value ==&#39;&#39;){value=&#39;******&#39;}" value="">
  </label>
  <div class="rem_sub">
    <label>
      <input type="submit" class="sub_button" id="button" value="登录" style="opacity: 0.7;">
    </label>
  </div>
</div>
</form>

<div id="forget_model" class="login_padding" style="display:none">
<br>

   <h1>Forgot password</h1>
   <br>
   <div class="forget_model_h2">(Please enter your registered email below and the system will automatically reset users’ password and send it to user’s registered email address.)</div>
    <label>
    <input type="text" id="usrmail" class="txt_input txt_input2">
   </label>

 
  <div class="rem_sub">
  <div class="rem_sub_l">
   </div>
    <label>
     <input type="submit" class="sub_buttons" name="button" id="Retrievenow" value="Retrieve now" style="opacity: 0.7;">
     　　　
     <input type="submit" class="sub_button" name="button" id="denglou" value="Return" style="opacity: 0.7;">　　
    
    </label>
  </div>
</div>






<!--login_padding  Sign up end-->
</div><!--login_boder end-->
</div><!--login_m end-->
 <br> <br>



</body>
</html>