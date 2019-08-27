
@extends('admin.layouts.main')

@section('title', '评论')

@section('content')
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">回复评论</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">管理</a>
				</li>
	            <li>
					<a href="{{ route('admin.comment.index') }}">评论</a>
				</li>
				<li class="active">
				    {{ isset($comment) ? '回复' : '新增' }}
				</li>
			</ol>
		</div>
	</div>

	<div class="row">
	    <div class="col-sm-12">
            <form class="form-horizontal" role="form" action="{{ route('admin.comment.reply', $comment->id) }}" method="POST">
                {{ method_field('PATCH') }}
            	{{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">

                    	@include('shared._errors')

                        <div class="card-box">
                            <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>基本信息</b></h5>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">文章标题</label>
                                <div class="col-md-4">
                                    <p style="position: relative;top: 5px;">{{ $comment->post->title }}</p>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">评论用户</label>
                                <div class="col-md-4">
                                    <p style="position: relative;top: 0px;">
                                        <a href="javascript:void(0)"><img src="{{ $comment->user->avatar }}" alt="头像" style="width: 35px;height: 35px;border-radius: 2px;"></a>
                                        &nbsp;{{ $comment->user->username }}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">评论内容</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="3" placeholder="评论内容">{{ $comment->content }}</textarea>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">回复内容</label>
                                <div class="col-md-6">
                                    <textarea name="content" class="form-control" rows="3" placeholder="请输入回复内容"></textarea>
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
