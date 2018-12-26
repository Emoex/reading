<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>嘻嘻嘻嘻</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/font.css">
	<link rel="stylesheet" href="/assets/css/ready.css">
	<link rel="stylesheet" href="/assets/css/demo.css">
	<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/assets/js/core/popper.min.js"></script>
	<script src="/assets/js/core/bootstrap.min.js"></script>
	<script src="/assets/js/plugin/chartist/chartist.min.js"></script>
	<script src="/assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
	<script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<script src="/assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
	<script src="/assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
	<script src="/assets/js/plugin/chart-circle/circles.min.js"></script>
	<script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src="/assets/js/ready.min.js"></script>
	<script src="/assets/js/demo.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.html" class="logo">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">


					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-envelope"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-img"> 
												<img src="/assets/img/profile2.jpg" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">
													Reza send messages to you
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span> 
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="{{session('admin')->face}}" alt="user-img" width="36" class="img-circle"><span >{{session('admin')->uname}}</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="{{session('admin')->face}}" alt="user"></div>
										<div class="u-text">
											<h4>{{session('admin')->uname}}</h4>
											<p class="text-muted">{{session('admin')->email}}</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
									<a class="dropdown-item" href="#"></i> My Balance</a>
									<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="/admin/logout"><i class="fa fa-power-off"></i>退出</a>

								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="{{session('admin')->face}}">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{session('admin')->uname}}
									<span class="user-level">@if(session('admin')->auth==1)超级管理员
                                                             @elseif(session('admin')->auth==2)普通管理员
                                                             @endif
									</span>

									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
					    <li class="nav-item active">
						 <div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample6" aria-expanded="true">
								<span>
									
									<i class="la la-user"></i><span class="user-level"> 管&nbsp理&nbsp员</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample6" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="/admin/admin">

											<i class="la la-reorder"></i>
											<p>管理员列表</p>
										</a>
									</li>
										<a href="/admin/admin/create">

											<i class="la la-user-plus"></i>
											<p>管理员添加</p>
										</a>
									</li>

								</ul>
							</div>
						</div>
						</li>
						<li class="nav-item active">
						 <div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample1" aria-expanded="true">
								<span>
									
									<i class="la la-group"></i><span class="user-level">用戶管理</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample1" aria-expanded="true" style="">
								<ul class="nav">
									<li>

										<a href="/admin/user">
											<i class="la la-reorder"></i>
											<p>用戶列表</p>
										</a>
									</li>
									<li>

										<a href="/admin/user/create">
											<i class="la la-plus-circle"></i>
											<p>用戶添加</p>
										</a>
									</li>

								</ul>
							</div>
						</div>
						</li>
						<li class="nav-item active">
						 <div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample2" aria-expanded="true">
								<span>
									
									<i class="la la-list"></i><span class="user-level">分类管理</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>
							<div class="collapse in" id="collapseExample2" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="/admin/cate">
											<i class="la la-reorder"></i>
											<p>分类列表</p>
										</a>
									</li>
									<li>
										<a href="/admin/cate/create">
											<i class="la la-plus-circle"></i>
											<p>分类添加</p>
										</a>
									</li>
								</ul>
							</div>
						</div>
						</li>
						<li class="nav-item active">
						 <div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
								<span>
									

									<i class="la la-book"></i><span class="user-level">文章管理</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>
							<div class="collapse in" id="collapseExample3" aria-expanded="true" style="">

								<ul class="nav">
									<li>
										<a href="/admin/article">
											<i class="la la-reorder"></i>
											<p>文章列表</p>
										</a>
									</li>
									<li>
										<a href="/admin/article/create">
											<i class="la la-plus-circle"></i>
											<p>文章添加</p>
										</a>
									</li>
								</ul>
							</div>
						</div>
						</li>
						<li class="nav-item active">
						 <div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample4" aria-expanded="true">
								<span>
									
									<i class="la la-music"></i><span class="user-level">电台管理</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>


							<div class="collapse in" id="collapseExample4" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="/admin/ting">
											<i class="la la-reorder"></i>
											<p>电台列表</p>
										</a>
									</li>
									<li>
										<a href="/admin/ting/create">
											<i class="la la-plus-circle"></i>
											<p>电台添加</p>
										</a>
									</li>
								</ul>
							</div>
						</div>
						</li>
						<li class="nav-item active">
						 <div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample4" aria-expanded="true">
								<span>
									
									<i class="la la-puzzle-piece"></i><span class="user-level">碎片管理</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample4" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="index.html">
											<i class="la la-reorder"></i>
											<p>碎片列表</p>
										</a>
									</li>
									<li>
										<a href="index.html">
											<i class="la la-plus-circle"></i>
											<p>碎片添加</p>
										</a>
									</li>
									<li>
										<a href="index.html">
											<i class="la la-wrench"></i>
											<p>碎片修改</p>
										</a>
									</li>
								</ul>
							</div>
						</div>
						</li>
						<li class="nav-item active">
						 <div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample5" aria-expanded="true">
								<span>
									
									<i class="la la-desktop"></i><span class="user-level">网站管理</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample5" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="index.html">
											<i class="la la-reorder"></i>
											<p>配置列表</p>
										</a>
									</li>
									<li>
										<a href="index.html">
											<i class="la la-plus-circle"></i>
											<p>配置添加</p>
										</a>
									</li>
									<li>
										<a href="index.html">
											<i class="la la-wrench"></i>
											<p>配置修改</p>
										</a>
									</li>
								</ul>
							</div>
						</div>
						</li>
						<li class="nav-item active">
						 <div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample6" aria-expanded="true">
								<span>
									
									<i class="la la-paperclip"></i><span class="user-level">友情链接</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample6" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="index.html">
											<i class="la la-reorder"></i>
											<p>友情链接列表</p>
										</a>
									</li>
									<li>
										<a href="index.html">
											<i class="la la-plus-circle"></i>
											<p>友情链接添加</p>
										</a>
									</li>
									<li>
										<a href="index.html">
											<i class="la la-wrench"></i>
											<p>友情链接修改</p>
										</a>
									</li>
								</ul>
							</div>
						</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<h4 class="page-title">{{ $title or '操作' }}</h4>
						</div>
						@if (session('success'))
						    <div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>{{ session('success') }}</strong> 
							</div>
						@endif
						@if (session('error'))
						    <div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>{{ session('error') }}</strong> 
							</div>
						@endif

						@section('content')
			
			
		                @show
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">									
					<p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
					<p>
						<b>We'll let you know when it's done</b></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>