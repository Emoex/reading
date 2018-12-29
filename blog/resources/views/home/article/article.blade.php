@extends('home/layout/index')
@section('content')
  <div class="index-content">
   <div class="article-info-box">
    <div class="article-header-img" style="display: none; background-image: url(&quot;&quot;);"></div> 
    <div class="article-info-content">
     <div class="article-info">
      <div class="article-header-info">
       <div class="article-type">
        <a href="./readNote.html" target="_blank">自由写作</a>
       </div> 
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
      <div class="if-no-login" style="display: none;">
        快来
       <a class="btn">登录</a>发表你的精彩评论啦 
      </div> 
      <div class="is-login" style="">
      <form action="/home/article/comment" method="post">
       {{ csrf_field() }}
       <textarea id="" maxlength="360" name="comment" placeholder="发表你的精彩评论啦"></textarea> 
       <div class="btn">
        <input type="submit" value="发表评论" class="btn" style="outline:medium;display:inline-block;background:none;border:none;cursor:pointer;">
       </div>
       </form>
      </div>
     </div> 
     <div class="article-comment">
      <div class="comment-title-cpt">
       <div>
        评论
        <span>(182&nbsp;条)</span>
       </div>
      </div> 
      <div class="comment-list-group">
       <div class="comment-cpt">
        <div class="comment-user-icon">
         <a href="../user/user.html?uid=4764921" target="_blank"><img src="http://thirdwx.qlogo.cn/mmopen/vi_32/1ticCtULhM44n9f8ghgNCWcac62HEJ8UfAt3CdiaASibBxPrIJrlLtibURmlY4GIYRnn4iasouuhYlXhVAVxic3iadAWw/132" /></a>
        </div> 
        <div class="comment-info">
         <div class="comment-user-info">
          <a href="../user/user.html?uid=4764921" target="_blank">4764921</a>2018-12-21 16:30 
          <span class="comment-reply">回复</span> 
          <span class="comment-del" style="display: none;">删除</span> 
          <span class="comment-number">0</span> 
          <span class="comment-del report">举报</span>
         </div> 
         <div class="comment-content">
          不错
         </div> 
         <div class="com-textarea hidden">
          <textarea name="" id="replyTextarea" maxlength="360" placeholder="请输入回复内容"></textarea> 
          <div class="btn-group">
           <div class="btn">
            发送
           </div> 
           <div class="btn-cancle">
            取消
           </div>
          </div>
         </div> 
        </div>
       </div>
       <div class="comment-cpt">
        <div class="comment-user-icon">
         <a href="../user/user.html?uid=3404651" target="_blank"><img src="http://q.qlogo.cn/qqapp/100339551/8F7A508551FF3247337B3665F290B595/100" /></a>
        </div> 
        <div class="comment-info">
         <div class="comment-user-info">
          <a href="../user/user.html?uid=3404651" target="_blank">吱吱1453813691</a>2018-12-4 13:35 
          <span class="comment-reply">回复</span> 
          <span class="comment-del" style="display: none;">删除</span> 
          <span class="comment-number">0</span> 
          <span class="comment-del report">举报</span>
         </div> 
         <div class="comment-content">
          谢谢你
         </div> 
         <div class="com-textarea hidden">
          <textarea name="" id="replyTextarea" maxlength="360" placeholder="请输入回复内容"></textarea> 
          <div class="btn-group">
           <div class="btn">
            发送
           </div> 
           <div class="btn-cancle">
            取消
           </div>
          </div>
         </div> 
        </div>
       </div>
       <div class="comment-cpt">
        <div class="comment-user-icon">
         <a href="../user/user.html?uid=3404651" target="_blank"><img src="http://q.qlogo.cn/qqapp/100339551/8F7A508551FF3247337B3665F290B595/100" /></a>
        </div> 
        <div class="comment-info">
         <div class="comment-user-info">
          <a href="../user/user.html?uid=3404651" target="_blank">吱吱1453813691</a>2018-12-4 13:35 
          <span class="comment-reply">回复</span> 
          <span class="comment-del" style="display: none;">删除</span> 
          <span class="comment-number">1</span> 
          <span class="comment-del report">举报</span>
         </div> 
         <div class="comment-content">
          谢谢你
         </div> 
         <div class="com-textarea hidden">
          <textarea name="" id="replyTextarea" maxlength="360" placeholder="请输入回复内容"></textarea> 
          <div class="btn-group">
           <div class="btn">
            发送
           </div> 
           <div class="btn-cancle">
            取消
           </div>
          </div>
         </div> 
        </div>
       </div>
       <div class="comment-cpt">
        <div class="comment-user-icon">
         <a href="../user/user.html?uid=4906915" target="_blank"><img src="http://qnstatic.pianke.me/public/assets/img/user-default-img.png" /></a>
        </div> 
        <div class="comment-info">
         <div class="comment-user-info">
          <a href="../user/user.html?uid=4906915" target="_blank">香瓜不填</a>2018-12-2 21:17 
          <span class="comment-reply">回复</span> 
          <span class="comment-del" style="display: none;">删除</span> 
          <span class="comment-number">0</span> 
          <span class="comment-del report">举报</span>
         </div> 
         <div class="comment-content">
          谢谢你的文章，对陷入迷茫期的我很有帮助
         </div> 
         <div class="com-textarea hidden">
          <textarea name="" id="replyTextarea" maxlength="360" placeholder="请输入回复内容"></textarea> 
          <div class="btn-group">
           <div class="btn">
            发送
           </div> 
           <div class="btn-cancle">
            取消
           </div>
          </div>
         </div> 
        </div>
       </div>
       <div class="comment-cpt">
        <div class="comment-user-icon">
         <a href="../user/user.html?uid=4179818" target="_blank"><img src="http://hpimg.pianke.com/f17113819620aca6dccfbb4dbf0772c720181112.png?imageView2/2/w/90/format/jpg" /></a>
        </div> 
        <div class="comment-info">
         <div class="comment-user-info">
          <a href="../user/user.html?uid=4179818" target="_blank">油条碳酸</a>2018-11-24 22:02 
          <span class="comment-reply">回复</span> 
          <span class="comment-del" style="display: none;">删除</span> 
          <span class="comment-number">0</span> 
          <span class="comment-del report">举报</span>
         </div> 
         <div class="comment-content">
          https://www.akc91.com/forum.php?x=51478露露
         </div> 
         <div class="com-textarea hidden">
          <textarea name="" id="replyTextarea" maxlength="360" placeholder="请输入回复内容"></textarea> 
          <div class="btn-group">
           <div class="btn">
            发送
           </div> 
           <div class="btn-cancle">
            取消
           </div>
          </div>
         </div> 
        </div>
       </div>
       <div class="comment-cpt">
        <div class="comment-user-icon">
         <a href="../user/user.html?uid=4792067" target="_blank"><img src="http://qnstatic.pianke.me/public/assets/img/user-default-img.png" /></a>
        </div> 
        <div class="comment-info">
         <div class="comment-user-info">
          <a href="../user/user.html?uid=4792067" target="_blank">艺一个你</a>2018-11-23 10:10 
          <span class="comment-reply">回复</span> 
          <span class="comment-del" style="display: none;">删除</span> 
          <span class="comment-number">0</span> 
          <span class="comment-del report">举报</span>
         </div> 
         <div class="comment-content">
          没有什么事是可以阻挡人的，思想很重要，潜能无限。
         </div> 
         <div class="com-textarea hidden">
          <textarea name="" id="replyTextarea" maxlength="360" placeholder="请输入回复内容"></textarea> 
          <div class="btn-group">
           <div class="btn">
            发送
           </div> 
           <div class="btn-cancle">
            取消
           </div>
          </div>
         </div> 
        </div>
       </div>
       <div class="comment-cpt">
        <div class="comment-user-icon">
         <a href="../user/user.html?uid=4883912" target="_blank"><img src="http://qnstatic.pianke.me/public/assets/img/user-default-img.png" /></a>
        </div> 
        <div class="comment-info">
         <div class="comment-user-info">
          <a href="../user/user.html?uid=4883912" target="_blank">淡写青春</a>2018-11-19 16:12 
          <span class="comment-reply">回复</span> 
          <span class="comment-del" style="display: none;">删除</span> 
          <span class="comment-number">0</span> 
          <span class="comment-del report">举报</span>
         </div> 
         <div class="comment-content">
          努力加油！
         </div> 
         <div class="com-textarea hidden">
          <textarea name="" id="replyTextarea" maxlength="360" placeholder="请输入回复内容"></textarea> 
          <div class="btn-group">
           <div class="btn">
            发送
           </div> 
           <div class="btn-cancle">
            取消
           </div>
          </div>
         </div> 
        </div>
       </div>
       <div class="comment-cpt">
        <div class="comment-user-icon">
         <a href="../user/user.html?uid=4866090" target="_blank"><img src="http://thirdwx.qlogo.cn/mmopen/vi_32/DYAIOgq83eraczSic0FoA37aZ5UBJtUdpgecSaFnicrDUzfFnBu6PpLraLytmTaW5xfVRtTiboia0uicVOmc1V1VcFw/132" /></a>
        </div> 
        <div class="comment-info">
         <div class="comment-user-info">
          <a href="../user/user.html?uid=4866090" target="_blank">&#55357;&#56371;4866090</a>2018-10-22 14:49 
          <span class="comment-reply">回复</span> 
          <span class="comment-del" style="display: none;">删除</span> 
          <span class="comment-number">0</span> 
          <span class="comment-del report">举报</span>
         </div> 
         <div class="comment-content">
          就像我们习惯了每天早晨六点半起床 食堂的早读 早上第一缕阳光的沐浴 习惯在图书馆的寂静
         </div> 
         <div class="com-textarea hidden">
          <textarea name="" id="replyTextarea" maxlength="360" placeholder="请输入回复内容"></textarea> 
          <div class="btn-group">
           <div class="btn">
            发送
           </div> 
           <div class="btn-cancle">
            取消
           </div>
          </div>
         </div> 
         <div class="comment-content-others">
          <a href="../user/user.html?uid=4883912" target="_blank">淡写青春:</a> +1 
          <span class="comment-del report">举报</span> 
          <span class="comment-del" style="display: none;">删除</span>
         </div>
        </div>
       </div>
       <div class="comment-cpt">
        <div class="comment-user-icon">
         <a href="../user/user.html?uid=4864480" target="_blank"><img src="http://thirdqq.qlogo.cn/qqapp/100339551/DE8CDDD2EB83A0A9AA22A2FA9DAC39A3/100" /></a>
        </div> 
        <div class="comment-info">
         <div class="comment-user-info">
          <a href="../user/user.html?uid=4864480" target="_blank">Draymond Green4864480</a>2018-10-19 11:34 
          <span class="comment-reply">回复</span> 
          <span class="comment-del" style="display: none;">删除</span> 
          <span class="comment-number">0</span> 
          <span class="comment-del report">举报</span>
         </div> 
         <div class="comment-content">
          现在看到是不是有点迟了……
         </div> 
         <div class="com-textarea hidden">
          <textarea name="" id="replyTextarea" maxlength="360" placeholder="请输入回复内容"></textarea> 
          <div class="btn-group">
           <div class="btn">
            发送
           </div> 
           <div class="btn-cancle">
            取消
           </div>
          </div>
         </div> 
         <div class="comment-content-others">
          <a href="../user/user.html?uid=1901459" target="_blank">aom:</a> 不迟 你还有2019年 
          <span class="comment-del report">举报</span> 
          <span class="comment-del" style="display: none;">删除</span>
         </div>
        </div>
       </div>
       <div class="comment-cpt">
        <div class="comment-user-icon">
         <a href="../user/user.html?uid=4854814" target="_blank"><img src="http://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTLMox6mIP38uGFWnvqBxsxOYIurj9hmCVicvP5ugylsxX2nic9EnDLDNMEzgtXibZ6RhkPcJG4zKjTwA/132" /></a>
        </div> 
        <div class="comment-info">
         <div class="comment-user-info">
          <a href="../user/user.html?uid=4854814" target="_blank">Chen4854814</a>2018-10-17 14:30 
          <span class="comment-reply">回复</span> 
          <span class="comment-del" style="display: none;">删除</span> 
          <span class="comment-number">0</span> 
          <span class="comment-del report">举报</span>
         </div> 
         <div class="comment-content"></div> 
         <div class="com-textarea hidden">
          <textarea name="" id="replyTextarea" maxlength="360" placeholder="请输入回复内容"></textarea> 
          <div class="btn-group">
           <div class="btn">
            发送
           </div> 
           <div class="btn-cancle">
            取消
           </div>
          </div>
         </div> 
        </div>
       </div> 
       <div class="common-more-btn" style="">
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
@endsection