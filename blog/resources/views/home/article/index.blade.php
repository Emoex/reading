@extends('home/layout/index')
@section('content')
<div class="container">
   <div class="slide-cpt">
    <div class="banner-btn left-btn"></div> 
    <div class="banner-img-box">
     <ul class="img-group">
      <li data-index="0" class="active" style="width: 640px; height: 375px; top: 0px; left: 150px; z-index: 8;"><a href="/pages/read/articleInfo.html?id=5937cad8a45a9ab0251edb63" target="_blank"><img src="http://pkimg.image.alimmdn.com/upload/20170607/d818133cfaa37a21c33b0f83d1c9f3e5.JPG" /></a></li>
      <li data-index="1" style="width: 493px; height: 289px; top: 33px; left: 0px; z-index: 6;"><a href="/pages/read/articleInfo.html?id=59351537e46c49bf23b2ed90" target="_blank"><img src="http://pkimg.image.alimmdn.com/upload/20170605/0d144da74b1fcce96635bf796654ab5c.JPG" /></a></li>
      <li data-index="2" style="width: 410px; height: 240px; top: 53px; left: 300px; z-index: 4;"><a href="/pages/read/articleInfo.html?id=5732c1d85d7743085b8b4582" target="_blank"><img src="http://pkimg.image.alimmdn.com/upload/20170424/1f0228123e2a97ef701337f4147bcd6b.JPG" /></a></li>
      <li data-index="3" style="width: 341px; height: 200px; top: 73px; left: 320px; z-index: 2;"><a href="/pages/read/articleInfo.html?id=58b6e67302334d4b7db7ae67" target="_blank"><img src="http://pkimg.image.alimmdn.com/upload/20170424/d360fe9a704805a2557aec4f080d5775.JPG" /></a></li>
      <li data-index="4" style="width: 256px; height: 150px; top: 93px; left: 50px; z-index: 0;"><a href="/pages/read/articleInfo.html?id=58c0ade202334d2617b7ae5b" target="_blank"><img src="http://pkimg.image.alimmdn.com/upload/20170424/63fadf9c7dbf681ae3fd5b2abcffd32e.JPG" /></a></li>
      <li data-index="5" style="width: 493px; height: 289px; top: 33px; left: 467px; z-index: 6;"><a href="/pages/read/articleInfo.html?id=58b8037301334d664b336ebc" target="_blank"><img src="http://pkimg.image.alimmdn.com/upload/20170327/ac2673a13084d89209a1da395b6ba606.JPG" /></a></li>
     </ul> 
     <div class="banner-line" style="width: 216px;">
      <div style="left: 0px;"></div>
     </div>
    </div> 
    <div class="banner-btn right-btn"></div>
   </div> 
   <div class="index-content">
    <div class="article-type-group">
     <div class="title-cpt">
      分类&nbsp;|&nbsp;Classification
     </div> 
     @foreach($cate as $k=>$v)
     <div class="article-type-cpt">
      <a href="/home/article/cate/{{ $v->id }}"><img src="{{ $v->path }}" /><span class="type-bg"></span><span class="type-title">{{ $v->name }}</span><span class="type-des">Story/1061篇</span></a>
     </div>
     @endforeach
    </div> 
    <div class="article-list-group">
     <div class="title-cpt">
      热门文章&nbsp;|&nbsp;Hot Articles
     </div> 
     
     @foreach($article as $k=>$v)
     <div class="article-cpt article-cpt-noimg">
      <div class="article-info">
       <div class="article-info-box">
        <div class="article-title">
         <a href="/home/article/{{ $v->id }}">{{ $v->title }}</a>
        </div> 
        <div class="article-author">
         <a href="../user/user.html?uid=4325575" target="_blank">By&nbsp;/&nbsp;{{ $v->User->uname }}</a>
        </div> 
        <div class="article-content" style="overflow:hidden;line-height:18px">
           {{ preg_replace('/<\/?.+?\/?>/','',$v->content) }}<span class="view-all"><a href="/home/article/{{ $v->id }}" target="_blank">VIEW ALL<img src="http://qnstatic.pianke.me/public/assets/img/viewall.png" /></a></span>  
         
        </div>
       </div> 
       <div class="article-others">
        {{ $v->look }}次阅读&nbsp;&nbsp;|&nbsp;&nbsp;评论:182&nbsp;&nbsp;|&nbsp;&nbsp;喜欢:{{ $v->like }} 
       </div>
      </div> 
      <div class="article-img" style="display: none;">
       <a href="/home/article/{{ $v->id }}" target="_blank"></a>
      </div>
     </div>
     @endforeach
     </div>
    </div> 
   </div>
  </div>
@endsection