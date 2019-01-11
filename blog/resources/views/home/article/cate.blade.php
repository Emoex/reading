@extends('home/layout/index')
@section('content')
 <div class="container">
   <div class="index-content">
    <div class="article-type-info" style="background-image: url(&quot;{{ $cate->path }}&quot;);">
     <span></span> 
     <div class="article-type-title">
      {{ $cate->name }}
     </div> 
     <div class="article-type-others">
      Story&nbsp;/&nbsp;1061篇文章
     </div> 
    </div> 
    <div class="type-title-cpt">
     <span class="active">HOT</span> 
     <span class="">NEW</span>
    </div> 



    @foreach($article as $k=>$v)
     <div class="article-cpt article-cpt-noimg">
      <div class="article-info">
       <div class="article-info-box">
        <div class="article-title">
         <a href="/home/article/{{ $v->id }}" target="_blank">{{ $v->title }}</a>
        </div> 
        <div class="article-author">
         <a href="/home/user/show" target="_blank">By&nbsp;/&nbsp;{{ $v->User->uname }}</a>
        </div> 
        <div class="article-content">
          {{ preg_replace('/<\/?.+?\/?>/','',$v->content) }}
         <span class="view-all"><a href="./articleInfo.html?id=5c258fa2257be9c54a60ce61" target="_blank">VIEW ALL<img src="http://qnstatic.pianke.me/public/assets/img/viewall.png" /></a></span>
        </div>
       </div> 
       <div class="article-others">
        {{ $v->look }}次阅读&nbsp;&nbsp;|&nbsp;&nbsp;评论:0&nbsp;&nbsp;|&nbsp;&nbsp;喜欢:{{ $v->like }} 
       </div>
      </div> 
      <div class="article-img" style="display: none;">
       <a href="./articleInfo.html?id=5c258fa2257be9c54a60ce61" target="_blank"></a>
      </div>
     </div>
     @endforeach
     <div class="no-more-data" style="display: none;">
      -&nbsp;已加载全部&nbsp;-
     </div> 
     <div class="loading" style="display: none;"></div>
    </div>


   </div>
  </div>


  <script>
      

  </script>
@endsection