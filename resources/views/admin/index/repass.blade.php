
@extends('admin.layouts.main')

@section('title', '修改密码')

@section('content')
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">我的资料</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">控制台</a>
				</li>
	            <li>
					<a href="{{ route('admin.dashboard.repass') }}">修改密码</a>
				</li>
				<li class="active">
				    编辑
				</li>
			</ol>
		</div>
	</div>
    
	<div class="row">
	    <div class="col-sm-12">
            <form class="form-horizontal" role="form" action="{{ route('admin.dashboard.repass') }}" method="POST">
            	{{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">

                    	@include('shared._errors')

                        <div class="card-box">
                            <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>修改密码</b></h5>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">新密码</label>
                                <div class="col-md-4">
                                	<input type="password" class="form-control" name="password" placeholder="请输入密码" value="">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">确认密码</label>
                                <div class="col-md-4">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="请确认密码" value="">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                            	<label class="col-md-2"></label>
                            	<div class="col-md-6">
                            		<button type="submit" class="btn w-sm btn-default waves-effect waves-light">保存</button>
                     				<button type="submit" class="btn w-sm btn-white waves-effect">取消</button>
                            	</div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
		</div>
	</div>
@stop
