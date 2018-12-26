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
                                       <form action="/admin/cate" method="post" enctype="multipart/form-data">
                                       {{ csrf_field() }}
									   <div class="form-group">
												<label for="exampleFormControlSelect1">分类:</label>
												<select class="form-control" id="exampleFormControlSelect1" name="cate">
												    <option value="">请选择分类</option>
													<option value="1">文章</option>
													<option value="2">碎片</option>
													<option value="3">电台</option>
												</select>
										</div>
										<div class="form-group">
											<label for="name">分类名称:</label>
											<input type="uname" class="form-control" id="name" name="name" placeholder="请输入分类名称">
										</div>
										<div class="form-group">
											<label for="path">分类图片:</label>
											<div><input type="file" name="path"></div>	
										</div>
										<input type="submit" value="添加" class="btn btn-success">
										</form>
@endsection