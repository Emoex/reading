@extends('home/layout/index')
@section('content')

<div class="container">
    <div class="index-content">
     <div class="radio-type-info">
      <div class="radio-type-img" style="width: 196px;height:196px;border-radius: 100%;margin:auto;border:1px solid #333;color: #333">
       <img src="{{ $cate->path }}" style="width:50px;height:50px;border:1px solid #000;margin-top:55px" />
       <div style="font-size: 15px;letter-spacing:3px;margin-top:5px;">{{ $cate->name }}</div>
       <input type="hidden" name="cid" value="{{ $cate->id }}">
       {{ csrf_field() }}
      </div> 
      <div class="radio-types">
       <div class="radio-type-link">
         分类: 
         @foreach($tcate as $k=>$v)
        <a href="/home/ting/{{ $v->id }}/edit" class="">{{ $v->name }}</a> 
        @endforeach
       </div>
      </div>
     </div> 
     
     <div class="ting-list-group" style="margin:auto;">
      <div class="ting-list ting-type-list" >
      @foreach($ting as $k=>$v)
       <div class="ting-cpt" >
        <div class="ting-img">
         <a href="/home/ting/{{ $v->id }}" target="_blank"><img src="{{ $v->img }}" class="lazy loaded" /><span></span></a>
        </div>       
        <div class="ting-info">
         <div class="ting-title">
          <a href="/home/ting/{{ $v->id }}" target="_blank">{{$v->title}}</a>
         </div> 
         <div class="ting-author">
          <a href="/home/personal/{{ $v->uid }}" target="_blank">主播&nbsp;/&nbsp;{{ $v->tname }}</a>
         </div> 
         <div class="ting-others">
          {{ $v->listen }}k次播放&nbsp;&nbsp;|&nbsp;&nbsp;评论:9&nbsp;&nbsp;|&nbsp;&nbsp;喜欢:{{ $v->like }}
         </div>
        </div>
        
       </div> 
       @endforeach
       <div class="loading" style="display: none;"></div> 
       <div class="no-more-data" style="display: none;">
        -&nbsp;已加载全部&nbsp;-
       </div>
      </div>
     </div>
    </div>
   </div> 
   <div class="back-top"></div> 

<script type="text/javascript">
      $(function(){
    // 当前页面
    var p = 2;
    // 条数
    var num = 6;
    // 标识符
    var isLoad = false;
    getDatas();
    function getDatas()
    {
      $.post('/home/ting/pinterest',{'_token':$('input[name=_token]').val(),'p':p,'num':num,'cid':{{ $cate->id }}},function(data){
          if(data.msg != 'error'){
            $.each(data,function(key,val){
              // 克隆div
              var temp = $('.ting-cpt').eq(0).clone(true);
              // 修div中内容
              temp.find('.ting-img a').eq(0).attr('href','/home/ting/'+val.id);
              temp.find('.ting-img a img').eq(0).attr('src',val.img);
              temp.find('.ting-title a').eq(0).attr('href','/home/ting/'+val.id);
              temp.find('.ting-title a').eq(0).html(val.title);
              temp.find('.ting-author a').eq(0).attr('href','home/personal/'+val.tname);
              temp.find('.ting-author a').eq(0).html('主播&nbsp;/&nbsp;'+val.tname);
              temp.find('.ting-others').eq(0).html(val.listen+'k次播放&nbsp;&nbsp;|&nbsp;&nbsp;评论:9&nbsp;&nbsp;|&nbsp;&nbsp;喜欢:'+val.like);
              // 追加到内容
              $('.ting-list').append(temp);
            });
            p++;
            isLoad = false;
          } 
        },'json');
    }

    // 当前页面滚动的加载数据
    $(window).scroll(function(){
      if(isLoad) return;
      // 全文高度
      var documentHeight = $(document).height();
      // 窗口高度
      var widthHeight = $(window).height();
      // 滚动高度
      var scrollHeight = $(window).scrollTop();
      // 计算底部距离
      var bottomHeight = documentHeight - widthHeight - scrollHeight;
      if(bottomHeight <= 200){
        isLoad = true;
        getDatas();
      }
    });


  });
</script>

@endsection('content')