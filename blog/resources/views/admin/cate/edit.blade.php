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
                                       <form action="/admin/cate/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                       {{ csrf_field() }}
                                       {{ method_field('PUT') }}
									   <div class="form-group">
												<label for="exampleFormControlSelect1">分类:</label>
												<select class="form-control" id="exampleFormControlSelect1" name="cate" onfocus"this.defaultIndex=this.selectedIndex;" onchange="this.selectedIndex=this.defaultIndex;">
													<option @if($data->cate == '1') selected @endif value="1">文章</option>
													<option @if($data->cate == '2') selected @endif value="2">碎片</option>
													<option @if($data->cate == '3') selected @endif value="3">电台</option>
												</select>
										</div>
										<div class="form-group">
											<label for="name">分类名称:</label>
											<input type="uname" class="form-control" id="name" name="name" value="{{ $data->name }}" placeholder="请输入分类名称">
										</div>
										<div class="form-group">
											<label for="path">分类图片:</label>
											<div><input type="file" name="path"></div>
											<img src="{{ $data->path }}" alt="" width="100px" height="100px">	
										</div>
										<input type="submit" value="修改" class="btn btn-success">
										</form>
			<style>
					#exampleFormControlSelect1{
						color:#aaa;
					}
			</style>
@endsection