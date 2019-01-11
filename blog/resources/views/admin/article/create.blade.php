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
   <form action="/admin/article" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
   <div class="form-group">
			<label for="exampleFormControlSelect1">文章分类</label>
			<select class="form-control" id="exampleFormControlSelect1" name="cate">
				@foreach($cate as $k=>$v)
				   <option value="{{ $v->id }}">{{ $v->name }}</option>
				@endforeach
			</select>
	</div>
	<div class="form-group">
		<label for="uid">用户:</label>
		<select class="form-control" id="uid" name="uid">
				@foreach($user as $k=>$v)
				   <option value="{{ $v->id }}">{{ $v->uname }}</option>
				@endforeach
	   </select>
	</div>
	<div class="form-group">
		<label for="title">标题:</label>
		<input type="title" class="form-control" id="title" name="title">
	</div>
	<div class="form-group">
		<label for="content">内容:</label>
		<!-- 加载编辑器的容器 -->
        <script id="container" name="content" type="text/plain"></script>
	</div>
	<div class="form-group">
		<label for="image">封面图片:</label>
		<input type="file" class="form-control" id="image" name="image">
	</div>
	<input type="submit" value="添加" class="btn btn-success">
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