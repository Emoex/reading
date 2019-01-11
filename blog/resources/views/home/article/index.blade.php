@extends('home/layout/index')
@section('content')
<div class="container">
     <!-- 轮播图 -->
<section class="pc-banner" style="width:100%;">
  <div class="swiper-container" style="width:960px;margin:auto;">
    <div class="swiper-wrapper">
      <div class="swiper-slide swiper-slide-center none-effect">
        <a href="#">
          <img src="/slideshow/img/1.jpg">
        </a>
        <div class="layer-mask"></div>
      </div>
      <div class="swiper-slide">
        <a href="#">
          <img src="/slideshow/img/2.jpg">
        </a>
        <div class="layer-mask"></div>
      </div>
      <div class="swiper-slide">
        <a href="#">
          <img src="/slideshow/img/3.jpg">
        </a>
        <div class="layer-mask"></div>
      </div>
  </div>
    
  </div>
  <div class="button">
      <div class="swiper-button-prev "><p class="banner-btn left-btn"></p></div>
      <div class="swiper-button-next"><p class="banner-btn right-btn"></p></div>
  </div>
</section>
<style type="text/css">
   .swiper-container .swiper-slide a img{
    height:350px;
   }
   .swiper-slide a img{
    width:550px;

    margin-left:-30px;
   }
   .swiper-slide a{
      width:500px;
      height:350px;

   } 
   .swiper-slide a img{
      border: 10px solid #fff;
   }
   .button .swiper-button-prev{
    background: #fff;
    position: relative;
    left:-1px;
    top:50px;
   }
   .button .swiper-button-prev:hover{
    background: #fff;
   }
   .button .swiper-button-next{
    background: #fff;
    position: relative;
    left:1100px;
    top:0px;
   }
   .button .swiper-button-next:hover{
    background: #fff;
   }
</style>
<script type="text/javascript" src="/slideshow/js/swiper.min.js"></script>
<script type="text/javascript">

  window.onload = function() {
    var swiper = new Swiper('.swiper-container',{
      autoplay: false,
      speed: 1000,
      autoplayDisableOnInteraction: false,
      loop: true,
      centeredSlides: true,
      slidesPerView: 2,
      pagination: '.swiper-pagination',
      paginationClickable: true,
      prevButton: '.swiper-button-prev',
      nextButton: '.swiper-button-next',
      onInit: function(swiper) {
        swiper.slides[2].className = "swiper-slide swiper-slide-active";
      },
      breakpoints: {
        668: {
          slidesPerView: 1,
        }
      }
    });
  }
</script> 

   
   <div class="index-content">
    <div class="article-type-group">
     <div class="title-cpt"  style="padding-top:0px;">
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