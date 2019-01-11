@extends('home/layout/index')
@section('content')

   <div class="container">
    <div class="radio-type">
     <div class="type-title-cpt">
      <span class="active">精选</span> 
      <span class="">全部电台</span>
     </div>
    </div> 

  
<!-- 轮播图开始 -->
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


<!-- 轮播图结束 -->

     <div class="index-content">
      <div class="radio-type-group">
      @foreach($cate as $k=>$v)
       <div class="radio-type-cpt">
        <a href="/home/ting/{{$v->id}}/edit"><img src="{{ $v->path }}" width="25px" />{{ $v->name}}</a>
       </div>
       @endforeach
      </div> 
<!-- 电台推荐 -->
      <div class="ting-list-group">
       <div class="title-cpt">
        推荐TING&nbsp;|&nbsp;Recommendation TING
       </div> 
       <div class="ting-list">
          @foreach($listen as $k=>$v)
          
            <div class="ting-cpt">
              
             <div class="ting-img">
              <a href="/home/ting/{{ $v->id }}" target="_blank"><img src="{{ $v->img }}" class="lazy" /> <span></span></a>
             </div> 
             <div class="ting-info">
              <div class="ting-title">
               <a href="/home/ting/{{ $v->id }}" target="_blank">{{ $v->title }}</a>
              </div> 
              <div class="ting-author">
               <a href="/pages/user/user.html?uid=296663" target="_blank">主播&nbsp;/&nbsp;{{$v->tname}}</a>
              </div> 
              <div class="ting-others">
               {{ $v->listen }}k次播放&nbsp;&nbsp;|&nbsp;&nbsp;评论:32&nbsp;&nbsp;|&nbsp;&nbsp;喜欢:{{ $v->likes }}
              </div>
             </div>
            </div>
          @endforeach

       </div>
      </div> 
<!-- 电台推荐结束 -->
<!-- 最热电台 -->
      <div class="ting-list-group">
       <div class="title-cpt">
        TOP TING
       </div> 
       <div class="ting-list">
       @foreach($like as $k=>$v)
        <div class="ting-cpt">
         <div class="ting-img">
          <a href="/home/ting/{{ $v->id }}" target="_blank"><img src="{{ $v->img }}" /> <span></span></a>
         </div> 
         <div class="ting-info">
          <div class="ting-title">
           <a href="/home/ting/{{ $v->id }}" target="_blank">{{ $v->title }}</a>
          </div> 
          <div class="ting-author">
           <a href="/pages/user/user.html?uid=716849" target="_blank">主播&nbsp;/&nbsp;{{ $v->tname }}</a>
          </div> 
          <div class="ting-others">
           {{ $v->listen }}k次播放&nbsp;&nbsp;|&nbsp;&nbsp;评论:0&nbsp;&nbsp;|&nbsp;&nbsp;喜欢:{{ $v->likes }} 
          </div>
         </div>
        </div>
       @endforeach
       </div>
      </div> 
<!-- 最热电台结束 -->
<!-- 最新发声 -->
     
      <div class="ting-list-group radio-ting-list">
       <div class="title-cpt">
        最新发声&nbsp;|&nbsp;New Voice
       </div> 
       <div class="ting-list">
         @foreach($tingid as $k=>$v)
        <div class="ting-cpt">
         <div class="ting-img">
          <a href="/home/ting/{{ $v->id }}" target="_blank"><img src="{{ $v->img }}" class="lazy" /> <span></span></a>
         </div> 
         <div class="ting-info">
          <div class="ting-title">
           <a href="/home/ting/{{ $v->id }}" target="_blank">{{ $v->title }}</a>
          </div> 
          <div class="ting-author">
           <a href="/pages/user/user.html?uid=4255398" target="_blank">主播&nbsp;/&nbsp;{{ $v->tname }}</a>
          </div> 
          <div class="ting-others">
           {{ $v->listen }}次播放&nbsp;&nbsp;|&nbsp;&nbsp;评论:2&nbsp;&nbsp;|&nbsp;&nbsp;喜欢:{{ $v->likes }} 
          </div>
         </div>
        </div>
         @endforeach
       </div>
      
      </div>
      
<!-- 最新发声结束 -->
     </div>
    


 
    



   <div class="back-top hidden"></div> 
</div>
@endsection