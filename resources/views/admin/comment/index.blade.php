
@extends('admin.layouts.main')

@section('title', '评论')

@section('stylesheet')
	<link href="{{ asset('assets/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('script')
	<script src="{{ asset('assets/plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
	<script src="{{ asset('assets/pages/jquery.bs-table.js') }}"></script>
@stop

@section('content')
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">评论列表</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">管理</a>
				</li>
				<li>
					<a href="{{ route('admin.comment.index') }}">评论</a>
				</li>
				<li class="active">
					列表
				</li>
			</ol>
		</div>
	</div>

	<!--Basic Columns-->
	<div class="row">
		<div class="col-sm-12">

			@include('shared._errors')

			<div class="card-box">
				<div class="row">
	            	<div class="col-sm-4">
	            		 <a href="" class="btn btn-default waves-effect waves-light m-b-30"><i class="fa fa-search"></i> 搜索</a>
	            	</div>
				</div>

				<table data-toggle="table" class="table table-condensed mails">
					<thead>
						<tr>
							<th class="w80">ID</th>
							<th>用户</th>
							<th>内容</th>
							<th>文章</th>
							<th>时间</th>
							<th class="text-center">状态</th>
							<th class="text-center">操作</th>
						</tr>
					</thead>

					@if(count($list))
					<tbody>
						@foreach($list as $val)
						<tr>
							<td>{{ $val->id }}</td>
							<td>
								<img src="{{ $val->user->avatar }}" alt="{{ $val->user->username }}" class="thumb-sm img-circle"> {{ $val->user->username }}
							</td>
							<td>{{ $val->content }}</td>
							<td>{{ $val->post->title }}</td>
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

				@include('admin.shared._page')
			</div>
		</div>
	</div>
@stop
