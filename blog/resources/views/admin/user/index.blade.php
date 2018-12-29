@extends('admin/layout/index')
@section('content')
<div class="card">
	<div class="card-header">
	<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="用户名搜索 ..." class="form-control" value='' name='content'>
							<div class="input-group-append">
								<span class="input-group-text">	
									<input type="submit"  value='搜索'>
								</span>
							</div>
						</div>
					</form>
		<table class="table mt-3 text-center">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">用户名</th>
					<th scope="col">性别</th>
					<th scope="col">头像</th>
					<th scope="col">电话</th>
					<th scope="col">邮箱</th>
					<th scope="col">操作</th>
				</tr>
			</thead>
			<tbody>
			@foreach($data as $k=>$v)
				<tr>
					<td>{{$v->id}}</td>
					<td>{{$v->uname}}</td>
					<td>{{$v->sex}}</td>
					<td><img src="{{$v->face}}" style="width:100px;height:100px;border-radius: 10px;" /></td>
					<td>{{$v->tel}}</td>
					<td>{{$v->email}}</td>
					<td>
						<a href="/admin/user/{{ $v->id }}/edit">修改</a>
						<a href="javascript:;" onclick="del({{$v->id}},this)">删除</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div id="paging">
		{{ $data->links() }}
	</div>
</div>
<div class='hidden'>
	{{ csrf_field() }}
</div>
<script type="text/javascript">
			function del(id,obj){
				$.post('/admin/user/'+id,{'_token':$('.hidden input').val(),'_method':'DELETE'},function(msg){
					if(msg=='success'){
						$(obj).parent().parent().remove();
					}else{
						alert('删除失败');
					}
				},'html');
			}
			</script>
<style type="text/css">
	a{
		color:#555;
	}
	#paging{
		margin:0 auto;
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