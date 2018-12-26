@extends('admin/layout/index')
@section('content')
<form class="navbar-left navbar-form nav-search mr-md-3" action="/admin/admin" method="get">
						<div class="input-group">
							<input type="text" placeholder="用户名" name="uname" value="{{ $params['uname'] or '' }}" class="form-control"><br>
							<div class="form-group">
								<select class="form-control" id="exampleFormControlSelect1" name="auth">
								 				<option @if(isset($params['auth']) && $params['auth'] == '_') selected @endif value="_">不选择</option>
												<option @if(isset($params['auth']) && $params['auth'] == '1') selected @endif value="1">超级管理员</option>
												<option @if(isset($params['auth']) && $params['auth'] == '2') selected @endif value="2">普通管理员</option>
								</select>
							</div>
							<div class="input-group-append">
								<span class="input-group-text">
									<input type="submit"  value="搜索" class="btn btn-primary btn-border btn-round">
								</span>
							</div>
						</div>
</form>
<div class="card-body">
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">用户名</th>
			<th scope="col">性别</th>
			<th scope="col">头像</th>
			<th scope="col">电话</th>
			<th scope="col">邮箱</th>
			<th scope="col">权限</th>
			<th scope="col">操作</th>
		</tr>
	</thead>
	<tbody>
	@foreach($admins as $k=>$v)
		<tr>
			<td>{{ $v->id }}</td>
			<td>{{ $v->uname }}</td>
			<td>{{ $v->sex }}</td>
			<td><img src="{{ $v->face }}" alt="" width="100px" height="100px"></td>
			<td>{{ $v->tel }}</td>
			<td>{{ $v->email }}</td>
			<td>@if($v->auth==1)超级管理员
                @elseif($v->auth==2)普通管理员
                @endif
			</td>
			<td>
			    <a href="/admin/admin/{{ $v->id }}/edit" class="btn btn-danger">修改</a>
			    <a href="javascript:;" onclick="destroy({{ $v->id }},this)" class="btn btn-warning">删除</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
<div id="paging">
			{{ $admins->appends($params)->links() }}
</div>	

</div>
<div class="hidden">
	{{ csrf_field() }}
</div>
<script>
		function destroy(id,obj){
			$.post('/admin/admin/'+id,{'_token':$('.hidden input').val(),'_method':'DELETE'},function(msg){
				if(msg == 'success'){
					$(obj).parent().parent().remove();
				}else{
					alert('删除失败');
				}
			},'html');
		}
</script>

<style type="text/css">
#paging{
	margin-left:40%;
}
#paging .active{
		background: blue;
	}
#paging .active span{
	color:#fff;
}
#paging li{
	width:30px;
	height:30px;
	border:1px solid #ccc;
	border-radius: 100%;
	text-align: center;
	line-height: 30px;
	margin:13px 6px;
}
#paging li:hover{
	background: #eee;
	color:blue;
}
#paging .disabled{
	background: #eee;
}

</style>
@endsection