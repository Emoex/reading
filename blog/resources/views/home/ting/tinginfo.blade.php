@extends('home/layout/index')
@section('content')
  <div class="container">
      <div class="index-content">
       <audio id="audiosrc" src="http://hpimg.pianke.com/25f2ac0489a6490efacbc748f94071b520181220.mp3">
        您的浏览器不支持 audio 标签。
       </audio> 
       <div class="ting-info-box">
        <div class="radio-info-content ting-info-content">
         <div class="ting-img">
          <img src="{{ $info->img }}" />
         </div> 
         <div class="radio-info ting-info">
          <div class="radio-title">
           {{ $info->title }}
          </div> 
          <div class="ting-others">
           {{ $info->listen }} k次播放&nbsp;&nbsp;|&nbsp;&nbsp;评论:&nbsp;33&nbsp;&nbsp;|&nbsp;&nbsp;喜欢:&nbsp;{{ $info->like }}
          </div> 
          <div class="authors">
           <div class="ting-author">
            主播:&nbsp;
            <a href="/home/personal/{{ $info->uid }}" target="_blank">{{ $info->tname }}</a>
           </div> 
           
          </div> 
          <label for="#audio">
          <div class="play-all" onclick="music()">
           <div class="btn-play play-status-btn" style="display:none;">
            播放Ting
           </div> 
           <div class="btn-pause play-status-btn" style="display:block;">
            暂停Ting
           </div>
           <div  style="display: none"><audio src="{{ $info->music }}" id="audio" autoplay="" controls=""></audio></div>
          </div>
          </label> 
          <script type="text/javascript">
             $(function(){
                   $('.btn-play').click(function(){
                      $('.btn-play').css('display','none');
                      $('.btn-pause').css('display','block');
                   })
                   $('.btn-pause').click(function(){
                      $('.btn-pause').css('display','none');
                      $('.btn-play').css('display','block');
                   })
                   $('#audio').click(function(){
                     alert(1);
                   })
                  music = function(){
                    var player = $("#audio")[0];
                    if (player.paused){ /*如果已经暂停*/
                        player.play(); /*播放*/
                    }else {
                        player.pause();/*暂停*/
                    }
                  }
              })
          </script>
          <div class="likes-cpt ting-like"></div> 
          <div class="ting-share">
           <div class="share-icon-cpt ting-share-icon"></div> 
           <div class="share-menu">
            <div class="drop-menu share-menu-item">
             <div class="share-cpt">
              <div class="share-sina"></div> 
              <div class="share-wechat">
               <div class="code">
                <img src="http://api5.pianke.me/version5.0/wxshare/qrcode.php?url=http%3A%2F%2Fpianke.me%2Fversion4.0%2Fweixin02%2Fwxshare.php%23!%2Fradio%2F5b66a442257be97613cf8964" width="200" />
               </div>
              </div> 
              <div class="share-qzone"></div> 
              <div class="share-dou"></div>
             </div>
            </div>
           </div>
          </div>
         </div>
        </div> 
        <div class="ting-article-content">
         <div class="title-cpt">
          原文
         </div> 
         <div class="article-content" style="height:213px;">
          <span style="display: block;padding-bottom: 10px;">-</span> <span style="height:110px;overflow: hidden;display: block;">{!! $article->content !!}</span>
          <span class="view-all" style="position: relative;padding-top:2px;padding-left:10px;"><a href="/home/article/{{$article->id}}" target="_blank">VIEW ALL<img src="http://qnstatic.pianke.me/public/assets/img/viewall.png" /></a></span>
         </div>
        </div> 
        <div class="ting-comment-box">
         <div class="ting-comment">
          <div class="is-login-cpt">
          @if(!session('user'))
           <div class="if-no-login">
             快来
            <a class="btn">登录</a>发表你的精彩评论啦 
           </div> 
           @else
           <div class="is-login" style="">
            <textarea name="comment" id="" maxlength="360" placeholder="发表你的精彩评论啦"></textarea> 
            <div class="btn" id="comment">
             发表评论
            </div>
           </div>
           @endif
          </div> 
          <div class="comment-title-cpt">
           <div>
            评论
            <span>(33&nbsp;条)</span>
           </div>
          </div> 
<!-- 评论开始 -->
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
                      $.post('/home/ting/comment',{'_token':$('input[name=_token]').val(),'tid':{{ $info->id }},'content':content,'parent_id':parent_id},function(data){
                     if(data['msg'] == 'success'){
                       div = '<div class="comment-content-others"><input type="hidden" name="parent_id" value="'+data['id']+'"><a href="../user/user.html?uid=4934695" target="_blank">　'+data['uname']+':</a>'+data['content']+'<span class="comment-del report" style="display: none;">举报</span><span class="comment-del" style="display:none">删除</span></div>';
                       $('.comment-content').eq(index).after(div);
                       $('.com-textarea').eq(index).addClass('hidden'); 
                       $('.reply').eq(index).val('');
                     }else{
                        error('回复失败');
                     }
                  },'json');

                    }else{
                      error('内容不能为空');
                    }

                  })

               }else{
                  $('.com-textarea').eq(index).addClass('hidden');
               } 
            }
            $('#comment').click(function(e){
               if($(this).prev().val()){
                  $.post('/home/ting/comment',{'_token':$('input[name=_token]').val(),'tid':{{ $info->id }},'content':$('[name=comment]').val(),'parent_id':0},function(data){
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
                        error('评论失败');
                     }
                  },'json');
               }else{
                  error('内容不能为空');
               }
            })
            
             //成功消息
             function success(text)
              {
                $('#success').text(text).show();
                setTimeout(function(){
                  $('#success').text('').hide();
                },2000);
              }

              //错误消息
             function error(text)
              {
                $('#error').text(text).show();
                setTimeout(function(){
                  $('#error').text('').hide();
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
<!-- 评论结束 -->
          <div class="comment-list-group">
          @foreach($comment as $k=>$v)
                 <div class="comment-cpt">
                  <div class="comment-user-icon">
                   <a href="../user/user.html?uid=166757" target="_blank"><img src="{{ $v->User->face }}" /></a>
                  </div> 
                  <div class="comment-info">
                   <div class="comment-user-info">
                    <a href="/home/user" target="_blank">{{ $v->User->nickname }}</a>{{ $v->created_at }} 
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
                    <textarea name="" id="replyTextarea" maxlength="360" class='reply' placeholder="请输入回复内容"></textarea> 
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
           </div> 
           <div class="common-more-btn" style="display: none;">
            查看更多评论
           </div> 
           <div class="no-more-data" style="display: none;">
            -&nbsp;已加载全部&nbsp;-
           </div>
          </div> 
          <div class="no-comment" style="display: none;">
            暂时没有评论，快和小伙伴互动吧 
          </div>
         </div>
        </div>
       </div>
      </div>
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
{{ csrf_field() }}
  <div class="back-top hidden"></div> 
}

@endsection