@extends('admin/layout/index')
@section('content')
	@if(count($errors) >0)
		<div calss='alert alert-danger'>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

 <form action="/admin/user/{{$data->id}}" method="post" enctype="multipart/form-data">

           {{ csrf_field() }}
           {{ method_field('PUT') }}
			<div class="form-group">
				<label for="uname">用户名:</label>
				<input type="uname" class="form-control" id="uname" value="{{ $data->uname }}" name="uname" placeholder="用户名" disabled>
			</div>
			<div class="form-group">
				<label for="sex">性别:</label>

				<select class="form-control" id="exampleFormControlSelect1" name="sex">
				@if($data->sex == '男')
						<option value="男" selected>男</option>
						<option value="女">女</option>
				@else
						<option value="男" >男</option>
						<option value="女" selected>女</option>
				@endif
				</select>	
			</div>
			<div class="form-group">
				<label for="face">头像:</label>
				<div><input type="file" name="face"></div>	
			</div>
			<div class="form-group">
				<label for="tel">电话:</label>
				<input type="tel" class="form-control" id="tel" name="tel" placeholder="电话" value="{{ $data->tel}}">
			</div>
			<div class="form-group">
				<label for="email">邮箱:</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="邮箱" value="{{ $data->email}}">
			</div>
			<input type="submit" value="修改" class="btn btn-success">
			</form>

@endsection