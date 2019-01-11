@extends('home/layout/index')
@section('content')
  <div class="index-content" style="padding-top:100px;">
   <div class="article-info-box">
    <div class="article-header-img" style="display: none; background-image: url(&quot;&quot;);"></div> 
    <div class="article-info-content">
     <div class="article-info">
      <div class="article-header-info">

       <div class="article-title">
        {{ $article->title }} 
        <a href="http://pianke.me/editor/#!/article/5a4ba0b74cfcf3be5384d9c8" target="_blank" style="display: none;"><span></span></a> 
        <span class="del-article" style="display: none;"></span>
       </div> 
       <div class="article-others">
        <a href="../user/user.html?uid=4325575" target="_blank"><img src="{{ $article->User->face }}" width="40px" /> {{ $article->User->uname }}</a> 
        <span>{{ $article->created_at }}&nbsp;&nbsp;|&nbsp;&nbsp;阅读时间: 8min&nbsp;&nbsp;|&nbsp;&nbsp;阅读次数:&nbsp;{{ $article->look }}</span>
       </div>
      </div> 
      <div class="article-content"> 
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
       <meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0" name="viewport" /> 
       <meta content="yes" name="apple-mobile-web-app-capable" /> 
       <title>片刻</title> 
       <style type="text/css">
        audio { width: 100%;}
        video { width: 100%;}
      </style> 
       <article class="typo container"> 
        <h1>{{ $article->title }}</h1> 
        <p class="author"><span>作者: {{ $article->User->uname }}</span>&nbsp;&nbsp; <span>8 min read</span>&nbsp;&nbsp; </p> 
		    {!! $article->content !!}
       </article> 
      </div> 
      <div class="article-report"> 
       <span class="report">举报</span>
      </div>
     </div> 
     <div class="article-handle">
      <div class="likes-cpt">
        {{ $article->like }} 
      </div> 
      <div class="share-cpt">
       <div class="share-sina"></div> 
       <div class="share-wechat">
        <div class="code">
         <img width="200" src="http://api5.pianke.me/version5.0/wxshare/qrcode.php?url=http%3A%2F%2Fpianke.me%2Fversion4.0%2Fweixin02%2Fwxshare.php%23!%2Farticle%2F5a4ba0b74cfcf3be5384d9c8" />
        </div>
       </div> 
       <div class="share-qzone"></div> 
       <div class="share-dou"></div>
      </div>
     </div> 
     <div class="is-login-cpt">
      @if(!session('user'))
      <div class="if-no-login">
        快来
       <a class="btn" href="/home/login">登录</a>发表你的精彩评论啦 
      </div> 
      @else
      <div class="is-login" style="">

       <input type="hidden" value="{{ $article->id }}" name="aid">
       <input type="hidden" value="{{ session('user')['uname'] }}" name="name">
       {{ csrf_field() }}
       <textarea id="" maxlength="360" name="comment" placeholder="发表你的精彩评论啦"></textarea> 
       <div class="btn" id="comment">
        发表评论
       </div>
      </div>

     @endif
<script type="text/javascript">
       $(function(){
            dododo = function (parent_id,obj)
            {
              var index = $(obj).parents('.comment-cpt').index();
              if($('.com-textarea').eq(index).hasClass('hidden')){
                  $('.com-textarea').addClass('hidden');
                  $('.com-textarea').eq(index).removeClass('hidden');

                  $('.btn-cancle').click(function(){
                    $('.com-textarea').eq(index).addClass('hidden');
                  })
                  
                  $('.send').eq(index).click(function(){
                    if($('.reply').eq(index).val()){
                      var content = $('.reply').eq(index).val();
                      $.post('/home/article/comment',{'_token':$('input[name=_token]').val(),'aid':$('input[name=aid]').val(),'content':content,'parent_id':parent_id},function(data){
                     if(data['msg'] == 'success'){
                       div = '<div class="comment-content-others"><input type="hidden" name="parent_id" value="'+data['id']+'"><a href="../user/user.html?uid=4934695" target="_blank">　'+data['uname']+':</a>'+data['content']+'<span class="comment-del report" style="display: none;">举报</span><span class="comment-del" style="display:none">删除</span></div>';
                       $('.comment-content').eq(index).after(div);
                       $('.com-textarea').eq(index).addClass('hidden'); 
                       $('.reply').eq(index).val('');
                     }else{
                        alert('回复失败');
                     }
                  },'json');

                    }else{
                      alert('内容不能为空');
                    }

                  })

               }else{
                  $('.com-textarea').eq(index).addClass('hidden');
               } 
            }

            $('#comment').click(function(e){
               if($(this).prev().val()){
                  $.post('/home/article/comment',{'_token':$('input[name=_token]').val(),'aid':$('input[name=aid]').val(),'content':$('[name=comment]').val(),'parent_id':0},function(data){
                     if(data['msg'] == 'success'){
                           $('.comment-cpt:last').children().first().children().first().attr('href','/home/user/');
                           $('.comment-cpt:last').children().first().children().first().children().first().attr('src',data['face']);
                           $('.comment-user-info:last').children().first().attr('href','/home/user');
                           $('.comment-user-info:last').children().first().text(data['uname']);
                           $('.comment-user-info:last').children().first().next().text('　'+data['time']);
                           $('.comment-content:last').text(data['content']);
                           $('.comment-number:last').text(data['like']);
                           $('.comment-cpt:last').css('display','');
                           $('.comment-list-group:first').prepend('<div class="comment-cpt" style="">'+$('.comment-cpt:last').html()+'</div>');
                           $('.comment-cpt:last').css('display','none');
                     }else{
                        alert('评论失败');
                     }
                  },'json');
               }else{
                  alert('内容不能为空');
               }
            })
            

       })
</script>     
     </div> 
     <div class="article-comment">
      <div class="comment-title-cpt">
       <div>
        评论
        <span>({{ $num }}&nbsp;条)</span>
       </div>
      </div> 
      <div class="comment-list-group">
        @foreach($comment as $k=>$v)
                 <div class="comment-cpt">
                    <input type="hidden" name="parent_id" value="{{ $v->id }}">
                    <div class="comment-user-icon">
                     <a href="/home/user" target="_blank"><img src="{{ $v->User->face }}" /></a>
                    </div> 
                    <div class="comment-info">
                     <div class="comment-user-info">
                      <a href="/home/user" target="_blank">{{ $v->User->uname }}</a><span>　{{ $v->created_at }}</span> 
                      <span class="comment-reply" onclick="dododo({{ $v->id }},this);">回复</span> 
                      <span class="comment-del" style="display: none;">删除</span> 
                      <span class="comment-number">{{ $v->like }}</span> 
                      <span class="comment-del report">举报</span>
                     </div> 
                     <div class="comment-content">
                      {{ $v->content }}
                     </div> 
                     @if($v->children)
                     @foreach($v->children as $kk=>$vv)
                       <div class="comment-content-others">
                          <a href="../user/user.html?uid=4934695" target="_blank">　{{ $vv->User->nickname }}:</a>{{ $vv->content }}
                          <a class="comment-del report replySpan" onclick="dododo({{ $vv->id }},this);">回复</a>
                          <span class="comment-del report" style="display: none;">举报</span>
                          <span class="comment-del" style="display: none;">删除</span>
                       </div>
                     @endforeach
                     @endif
                     <div class="com-textarea hidden">
                      <textarea name="reply" class="reply" id="replyTextarea" maxlength="360" placeholder="请输入回复内容"></textarea> 
                      <div class="btn-group">
                       <div class="btn send">
                        发送
                       </div> 
                       <div class="btn-cancle">
                        取消
                       </div>
                      </div>
                     </div> 

                    </div>
                  </div>
       @endforeach
 




       <div class="comment-cpt" style="display:none">
        <div class="comment-user-icon">
         <a href="../user/user.html?uid=3404651" target="_blank"><img src="http://q.qlogo.cn/qqapp/100339551/8F7A508551FF3247337B3665F290B595/100" /></a>
        </div> 
        <div class="comment-info">
         <div class="comment-user-info">
          <a href="../user/user.html?uid=3404651" target="_blank">吱吱1453813691</a><span>2018-12-4 13:35</span> 
          <span class="comment-reply">回复</span> 
          <span class="comment-del" style="display: none;">删除</span> 
          <span class="comment-number">0</span> 
          <span class="comment-del report">举报</span>
         </div> 
         <div class="comment-content">
          谢谢
         </div> 
         <div class="com-textarea hidden">
          <textarea name="" class="reply" id="replyTextarea" maxlength="360" placeholder="请输入回复内容"></textarea> 
          <div class="btn-group">
           <div class="btn send">
            发送
           </div> 
           <div class="btn-cancle">
            取消
           </div>
          </div>
         </div> 
        </div>
       </div>

<!--        <div class="common-more-btn" style="">
        查看更多评论
       </div> 
       <div class="no-more-data" style="display: none;">
        -&nbsp;已加载全部&nbsp;-
       </div>
      </div> 
      <div class="no-comment" style="display: none;">
        暂时没有评论，快和小伙伴互动吧 
      </div> -->
     </div>
    </div>
   </div>
  </div>
 </div>
@endsection