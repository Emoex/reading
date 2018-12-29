@extends('admin/layout/index')
@section('content')
<div class="card-body">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   <form action="/admin/article/{{ $article->id }}" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
   {{ method_field('PUT') }}
   <div class="form-group">
			<label for="exampleFormControlSelect1">文章分类</label>
			<select class="form-control" id="exampleFormControlSelect1" name="cate">
				@foreach($cate as $k=>$v)
				   <option  @if($article->cid == $v->id) selected @endif value="{{ $v->id }}">{{ $v->name }}</option>
				@endforeach
			</select>
	</div>
	<div class="form-group">
		<label for="uname">用户名:</label>
		<select class="form-control" id="exampleFormControlSelect1" name="uid">
				@foreach($user as $k=>$v)
				   <option  @if($article->uid == $v->id) selected @endif value="{{ $v->id }}">{{ $v->uname }}</option>
				@endforeach
	   </select>
	</div>
	<div class="form-group">
		<label for="title">标题:</label>
		<input type="title" class="form-control" value="{{ $article->title }}" id="title" name="title">
	</div>
	<div class="form-group">
		<label for="content">内容:</label>
		<!-- 加载编辑器的容器 -->
        <script id="container" name="content"   type="text/plain">{!! $article->content !!}</script>
	</div>
	<div class="form-group">
		<label for="image">封面图片:</label>
		<input type="file" class="form-control" id="image" name="image">
		<img src="{{ $article->image }}" alt="" width="100px" height="100px">
	</div>
	<input type="submit" value="修改" class="btn btn-success">
	</form>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/utf8/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/utf8/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{toolbars: [['bold','fullscreen', 'source', 'undo', 'redo','simpleupload','underline','strikethrough','fontfamily','fontsize','justifyleft', 'justifyright','justifycenter','justifyjustify','forecolor','autotypeset']]});
    </script>

@endsection