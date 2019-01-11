@extends('home/layout/index')
@section('content')

<div class="container">
    <div class="focus-picture">
     <div class="">
      <a href="/pages/read/articleInfo.html?id=5a66d52f257be99e1d64c5da" target="_blank"><img src="http://hpimg.pianke.com/2bc9aa39ea47b28e3477096514667cae20180814.jpg?imageView2/2/w/640/format/jpg" /> <span class="article-focus-bg"></span> <span class="article-focus-title">杀掉一个无人际关系的人</span></a>
     </div>
     <div class="">
      <a href="/pages/read/articleInfo.html?id=5b725b83257be94b69cf8962" target="_blank"><img src="http://hpimg.pianke.com/01a158910150133149221cfef791e0b220180814.jpg?imageView2/2/w/640/format/jpg" /> <span class="article-focus-bg"></span> <span class="article-focus-title">我想要一个无条件站在我身边的人。</span></a>
     </div>
     <div class="">
      <a href="/pages/read/articleInfo.html?id=5b69832a257be98714cf8962" target="_blank"><img src="http://hpimg.pianke.com/6c4d64457db904a94057bc4c3a5859ed20180814.jpg?imageView2/2/w/640/format/jpg" /> <span class="article-focus-bg"></span> <span class="article-focus-title">我的女朋友是借来的，最后我把她弄丢了</span></a>
     </div>
     <div class="">
      <a href="/pages/read/articleInfo.html?id=5a4c3c2a4cfcf3927b84d9c5" target="_blank"><img src="http://hpimg.pianke.com/1045d95381b0b09d765e5e3f7a74545120180814.jpg?imageView2/2/w/640/format/jpg" /> <span class="article-focus-bg"></span> <span class="article-focus-title">此身越重洋，此生多勉强</span></a>
     </div>
     <div class="">
      <a href="/pages/read/articleInfo.html?id=5982e7c6a581a338372a3d48" target="_blank"><img src="http://hpimg.pianke.com/25c4460266d120ed5536c854a84e8ea620171012.jpg?imageView2/2/w/640/format/jpg" /> <span class="article-focus-bg"></span> <span class="article-focus-title">坚持绘画147天，这些意想不到的事情发生了</span></a>
     </div>
    </div> 
    <div class="index-content">
    
      <div class="article-list-group">
      <div class="title-cpt" >
       阅读&nbsp;|&nbsp;Read
      </div> 
      @foreach($article as $k=>$v)
      <div class="article-cpt" >
       <div class="article-info" style="width:100%;">
        <div class="article-info-box">
         <div class="article-title">
          <a href="/home/article/{{ $v->id }}" target="_blank">{{ $v->title }}</a>
         </div> 
         <div class="article-author">
          <a href="../../pages/user/user.html?uid=119707" target="_blank">By&nbsp;/&nbsp;{{ $v->User->nickname }}</a>
         </div> 
         <div class="article-content" style="line-height: 22px">
           {!! $v->content !!}
          <span class="view-all"><a href="/home/article/{{ $v->id }}" target="_blank">VIEW ALL<img src="http://qnstatic.pianke.me/public/assets/img/viewall.png" /></a></span>
         </div>
        </div> 
        <div class="article-others">
         {{ $v->look }}k次阅读&nbsp;&nbsp;|&nbsp;&nbsp;评论:59&nbsp;&nbsp;|&nbsp;&nbsp;喜欢:{{ $v->like }} 
        </div>
       </div> 
      </div>
      @endforeach
     </div> 


     <div class="ting-list-group">
      <div class="title-cpt">
       TING
      </div> 
      <div class="ting-list">
      @foreach($tingid as $k=>$v)
       <div class="ting-cpt">
        <div class="ting-img">
         <a href="/home/ting/{{ $v->id }}" target="_blank"><img src="{{ $v->img }}" /><span></span></a>
        </div> 
        <div class="ting-info">
         <div class="ting-title">
          <a href="/home/ting/{{ $v->id }}" target="_blank">{{ $v->title }}</a>
         </div> 
         <div class="ting-author">
          <a href="../../pages/user/user.html?uid=145858" target="_blank">主播&nbsp;/&nbsp;{{ $v->tname }}</a>
         </div> 
         <div class="ting-others">
          {{ $v->listen }}k次播放&nbsp;&nbsp;|&nbsp;&nbsp;评论:50&nbsp;&nbsp;|&nbsp;&nbsp;喜欢:{{ $v->likes }} 
         </div>
        </div>
       </div>
       @endforeach
      </div>
     </div>  
     


     <div class="user-list-group">
      <div class="title-cpt">
       人气片客&nbsp;|&nbsp;Hot Pianker
      </div> 
       <div class="user-list">
   <div class="user-cpt">
    <div class="user-info">
     <div class="user-cpt-left">
      <a href="/pages/user/user.html?uid=4044800" target="_blank"><img src="http://tva2.sinaimg.cn/crop.0.0.996.996.50/ec39c62fjw8f6ddod449ij20ro0rp0vb.jpg" /></a> 
      <img src="../../public/assets/img/user_musician.png" />
     </div> 
     <div class="user-cpt-right">
      <div class="user-name">
       <a href="/pages/user/user.html?uid=4044800" target="_blank">双笙子</a>
      </div> 
      <div class="user-des">
       古风歌手双笙
      </div>
     </div>
    </div>
   </div>
   <div class="user-cpt">
    <div class="user-info">
     <div class="user-cpt-left">
      <a href="/pages/user/user.html?uid=3917369" target="_blank"><img src="http://tva4.sinaimg.cn/crop.0.0.512.512.180/7f71be41jw8etj0gb4oovj20e80e8mxf.jpg" /></a> 
      <img src="../../public/assets/img/user_musician.png" />
     </div> 
     <div class="user-cpt-right">
      <div class="user-name">
       <a href="/pages/user/user.html?uid=3917369" target="_blank">MrMiss组合</a>
      </div> 
      <div class="user-des">
       28届金曲奖最佳演唱組合/爵士人声组合MrMiss
      </div>
     </div>
    </div>
   </div>
   <div class="user-cpt">
    <div class="user-info">
     <div class="user-cpt-left">
      <a href="/pages/user/user.html?uid=3944421" target="_blank"><img src="http://pkicon.image.alimmdn.com/icon/20161125/126c947d4b6f525cb61ac69519450ec2.png@90w_90h_1e_1c_85Q.jpg" /></a> 
      <img src="../../public/assets/img/user_musician.png" />
     </div> 
     <div class="user-cpt-right">
      <div class="user-name">
       <a href="/pages/user/user.html?uid=3944421" target="_blank">Muma木马</a>
      </div> 
      <div class="user-des">
       摇滚音乐人 木马
      </div>
     </div>
    </div>
   </div>
   <div class="user-cpt">
    <div class="user-info">
     <div class="user-cpt-left">
      <a href="/pages/user/user.html?uid=4337098" target="_blank"><img src="http://wx.qlogo.cn/mmopen/Qo5MQt4c6EBMGzhTXq8f6VfaSwbKFUjG8gYCnBgibk5TRxUEAvDjGvUteiaHZcRHJf4icCWnicibb9x2LkwiaKovibkQLEYkpuYNicZg/0" /></a> 
      <img src="../../public/assets/img/user_author.png" />
     </div> 
     <div class="user-cpt-right">
      <div class="user-name">
       <a href="/pages/user/user.html?uid=4337098" target="_blank">片刻小主</a>
      </div> 
      <div class="user-des">
       片刻官方猫&#55357;&#56369;
      </div>
     </div>
    </div>
   </div>
  </div>
     </div>
    </div> 

<!-- 瀑布流全部电台开始 -->


<!-- 瀑布流全部电台结束 -->

</div>
@endsection('content')