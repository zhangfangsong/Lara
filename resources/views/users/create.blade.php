
@extends('layouts.default')

@section('title', '注册')

@section('content')
	<div class="account-pages"></div>
	<div class="clearfix"></div>
	<div class="wrapper-page">

		@include('shared._errors')

		<div class=" card-box">
			<div class="panel-heading">
				<h3 class="text-center"> 注册 <strong class="text-custom">{{ $cfg->title }}</strong> </h3>
			</div>

			<div class="panel-body">
				<form class="form-horizontal m-t-20" action="{{ route('signup') }}" method="POST">
					{{ csrf_field() }}

					<div class="form-group ">
						<div class="col-xs-12">
							<input class="form-control" type="text" name="username" placeholder="昵称" value="{{ old('username') }}">
						</div>
					</div>

					<div class="form-group ">
						<div class="col-xs-12">
							<input class="form-control" type="text" name="email" placeholder="邮箱" value="{{ old('email') }}">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control" type="password" name="password" placeholder="密码" value="{{ old('password') }}">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control" type="password" name="password_confirmation" placeholder="确认密码">
						</div>
					</div>

					<div class="form-group text-center m-t-40">
						<div class="col-xs-12">
							<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">
								注 册
							</button>
						</div>
					</div>

				</form>

			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 text-center">
				<p>
					已有账号?<a href="{{ route('login') }}" class="text-primary m-l-5"><b> 登录</b></a>
				</p>
			</div>
		</div>

	</div>
@stop