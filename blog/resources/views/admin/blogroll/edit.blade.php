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

 <form action="/admin/blogroll/{{$data->id}}" method="post">

           {{ csrf_field() }}
           {{ method_field('PUT') }}

			<div class="form-group">
				<label for="bname">网站名称:</label>
				<input type="text" class="form-control" id="bname" value="{{ $data->name }}" name="bname" placeholder="用户名">
			</div>
			<div class="form-group">
				<label for="burl">链接地址:</label>
				<input type="text" class="form-control" id="burl" name="burl" placeholder="电话" value="{{ $data->url}}">
			</div>
			<input type="submit" value="修改" class="btn btn-success">
			</form>

@endsection