@extends('admin.layouts.main')
@section('title', '仪表盘')

@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">
	<link href="{{ asset('assets/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('script')
	<script src="{{ asset('assets/plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
	<script src="{{ asset('assets/pages/jquery.bs-table.js') }}"></script>
	
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });

            $(".knob").knob();
        });
    </script>
@stop

@section('content')
	<!-- Page-Title -->
	<div class="row">
	    <div class="col-sm-12">
	        <h4 class="page-title">仪表盘</h4>
	        <p class="text-muted page-title-alt">欢迎来到 Lara 仪表盘 !</p>
	    </div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			@include('shared._errors')
		</div>
	</div>

	<div class="row">
	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box fadeInDown animated">
	            <div class="bg-icon bg-icon-info pull-left">
	                <i class="md md-attach-money text-info"></i>
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">{{ $userCount }}</b></h3>
	                <p class="text-muted">用户数</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>

	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box">
	            <div class="bg-icon bg-icon-pink pull-left">
	                <i class="md md-add-shopping-cart text-pink"></i>
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">{{ $postCount }}</b></h3>
	                <p class="text-muted">文章数</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>

	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box">
	            <div class="bg-icon bg-icon-purple pull-left">
	                <i class="md md-equalizer text-purple"></i>
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">{{ $commentCount }}</b></h3>
	                <p class="text-muted">评论数</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>

	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box">
	            <div class="bg-icon bg-icon-success pull-left">
	                <i class="md md-remove-red-eye text-success"></i>
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">{{ $linkCount }}</b></h3>
	                <p class="text-muted">友链数</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>
	</div>

	<div class="row">

	    <div class="col-lg-4">
			<div class="card-box">
				<h4 class="text-dark header-title m-t-0 m-b-30">系统负载</h4>

				<div class="widget-chart text-center">
	                <input class="knob" data-width="150" data-height="150" data-linecap=round data-fgColor="#fb6d9d" data-min="0" data-max="10" value="{{ $load[0] }}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15"/>
	            	<h5 class="text-muted m-t-20">系统负载</h5>
	            	<h2 class="font-600">{{ $load[0] }}</h2>
	            	<ul class="list-inline m-t-15">
	            		<li>
	            			<h5 class="text-muted m-t-20">1 min</h5>
	            			<h4 class="m-b-0">{{ $load[0] }}</h4>
	            		</li>
	            		<li>
	            			<h5 class="text-muted m-t-20">5 min</h5>
	            			<h4 class="m-b-0">{{ $load[1] }}</h4>
	            		</li>
	            		<li>
	            			<h5 class="text-muted m-t-20">15 min</h5>
	            			<h4 class="m-b-0">{{ $load[2] }}</h4>
	            		</li>
	            	</ul>
	        	</div>
			</div>

	    </div>
	    
	    <div class="col-lg-8">
	        <div class="card-box">
				<h4 class="text-dark header-title m-t-0 p-b-10">最新评论</h4>

				<table data-toggle="table" class="table table-condensed mails">
					<thead>
						<tr>
							<th class="w80">ID</th>
							<th>用户</th>
							<th>内容</th>
							<th>时间</th>
							<th class="text-center">状态</th>
							<th class="text-center">操作</th>
						</tr>
					</thead>

					@if(count($comments))
					<tbody>
						@foreach($comments as $val)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>
								<img src="{{ $val->user->avatar }}" alt="{{ $val->user->username }}" class="thumb-sm img-circle"> {{ $val->user->username }}
							</td>
							<td>{{ $val->content }}</td>
							<td>{{ $val->created_at->diffForHumans() }}</td>
							<td><span class="label label-table {{ $val->status == 1 ? 'label-default' : 'label-warning' }}">{{ $val->status == 1 ? '显示' : '隐藏' }}</span></td>
							<td>
								<a href="{{ route('admin.comment.edit', $val->id) }}" class="btn btn-default waves-effect waves-light btn-xs m-l-5"><i class="fa fa-eye"></i></a>
								<a href="{{ route('admin.comment.destroy', $val->id) }}" class="btn btn-danger waves-effect waves-light btn-xs m-l-5"><i class="fa fa-remove"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
					@endif
				</table>
			</div>
	    </div>

	</div>

	<div class="row">
		<div class="col-lg-12">
	        <div class="card-box">
				<h4 class="text-dark header-title m-t-0 p-b-10">最新文章</h4>

				<table data-toggle="table" class="table table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>标题</th>
							<th>分类</th>
							<th>标签</th>
							<th>浏览量</th>
							<th>评论数</th>
							<th>发布时间</th>
							<th>状态</th>
							<th class="text-center">操作</th>
						</tr>
					</thead>
					
					@if(count($posts))
					<tbody>
						@foreach($posts as $val)
						<tr>
							<td>{{ $val->id }}</td>
							<td title="{{ $val->title }}">{{ Str::limit($val->title, 60) }}</td>
							<td>{{ $val->category->name }}</td>
							<td>{{ $val->keyword }}</td>
							<td>{{ $val->views }}</td>
							<td>{{ $val->replies }}</td>
							<td>{{ $val->created_at->diffForHumans() }}</td>
							<td><span class="label label-table {{ $val->status == 1 ? 'label-default' : 'label-warning' }}">{{ $val->status == 1 ? '显示' : '隐藏' }}</span></td>
							<td>
								<a href="{{ route('admin.post.edit', $val->id) }}" class="btn btn-default waves-effect waves-light btn-xs m-l-5"><i class="fa fa-pencil"></i></a>
								<a href="{{ route('admin.post.destroy', $val->id) }}" class="btn btn-danger waves-effect waves-light btn-xs m-l-5"><i class="fa fa-remove"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
					@endif
				</table>
			</div>
		</div>
	</div>
@stop