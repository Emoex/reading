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
                                       <form action="/admin/admin/{{ $admin->id }}" method="post" enctype="multipart/form-data">
                                       {{ csrf_field() }}
                                       {{ method_field('PUT') }}
									   <div class="form-group">
												<label for="exampleFormControlSelect1">权限:</label>
												<select class="form-control" id="exampleFormControlSelect1" name="auth">
													<option @if($admin->auth == 1) selected @endif value="1">超级管理员</option>
													<option @if($admin->auth == 2) selected @endif value="2">普通管理员</option>
												</select>
										</div>
										<div class="form-group">
											<label for="uname">用户名:</label>
											<input type="uname" class="form-control" id="uname" name="uname" disabled value="{{ $admin->uname }}"  placeholder="以字母开头的7-16位字母数字下划线组合">
										</div>
										<div class="form-group">
											<label for="sex">性别:</label>
											<select class="form-control" id="exampleFormControlSelect1" name="sex">
													<option @if($admin->auth == '男') selected @endif value="男">男</option>
													<option @if($admin->auth == '女') selected @endif value="女">女</option>
											</select>	
										</div>
										<div class="form-group">
											<label for="face">头像:</label>
											<div><input type="file" name="face" id="face"></div>	
											<img src="{{ $admin->face }}" alt="">
										</div>
										<div class="form-group">
											<label for="tel">电话:</label>
											<input type="tel" class="form-control" id="tel" name="tel" value="{{ $admin->tel }}" placeholder="电话">
										</div>
										<div class="form-group">
											<label for="email">邮箱:</label>
											<input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" placeholder="邮箱">
										</div>
										<input type="submit" value="修改" class="btn btn-success">
										</form>
@endsection