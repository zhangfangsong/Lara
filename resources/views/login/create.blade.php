
@extends('layouts.default')

@section('title', '登录')

@section('content')
    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">

        @include('shared._errors')

    	<div class="card-box">
            <div class="panel-heading">
                <h3 class="text-center"> 登录 <strong class="text-custom">{{ $cfg->title }}</strong> </h3>
            </div>

            <div class="panel-body">
            <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="username" placeholder="用户名/邮箱" value="{{ old('username') }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" placeholder="密码" value="{{ old('password') }}">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox" name="remember">
                            <label for="checkbox-signup">
                                记住我
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">登 录</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="#" class="text-dark"><i class="fa fa-lock m-r-5"></i> 忘记密码?</a>
                    </div>
                </div>
            </form>

            </div>
        </div>

        <div class="row">
        	<div class="col-sm-12 text-center">
        		<p>还没有账号? <a href="{{ route('signup') }}" class="text-primary m-l-5"><b>注册</b></a></p>

            </div>
        </div>

    </div>
@stop
