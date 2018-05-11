
@extends('admin.layouts.main')

@section('title', '分类')

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
			<h4 class="page-title">分类列表</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">WeBlog</a>
				</li>
				<li>
					<a href="#">分类</a>
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
	            		<form role="form" action="">
	                        <div class="form-group contact-search m-b-30">
	                        	<input name="name" type="text" id="search" class="form-control" placeholder="Search...">
	                            <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
	                        </div>
	                    </form>
	            	</div>

	            	<div class="col-sm-4">
	            		 <a href="{{ route('admin.category.create') }}" class="btn btn-default waves-effect waves-light m-b-30"><i class="md md-add"></i> 新增</a>
	            	</div>
				</div>

				<table data-toggle="table" class="table table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>名称</th>
							<th>描述</th>
							<th>排序</th>
							<th>状态</th>
							<th class="text-center">操作</th>
						</tr>
					</thead>

					@if($list->count())
					<tbody>
						@foreach($list as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td>{{ $category->name }}</td>
							<td>{{ $category->description }}</td>
							<td>{{ $category->sort }}</td>
							<td><span class="label label-table {{ $category->status == 1 ? 'label-default' : 'label-warngin' }}">{{ $category->status == 1 ? '显示' : '隐藏' }}</span></td>
							<td>
								<a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-default waves-effect waves-light btn-xs m-l-5"><i class="fa fa-pencil"></i></a>
								<a href="{{ route('admin.category.destroy', $category->id) }}" class="btn btn-danger waves-effect waves-light btn-xs m-l-5"><i class="fa fa-remove"></i></a>
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