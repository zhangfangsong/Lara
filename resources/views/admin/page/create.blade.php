
@extends('admin.layouts.main')

@section('title', '页面')

@section('stylesheet')
    <link href="{{ asset('uploader/webuploader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('script')
    <script src="{{ asset('uploader/webuploader.js') }}"></script>
    <script src="{{ asset('quill/quill.js') }}"></script>
    <script src="{{ asset('backend/js/editor.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>

    <script type="text/javascript">

        var imageDeal = function(ele, returnBase64) {
            //获取file，转成base64
            var file = ele.files[0]; //取传入的第一个文件
            if(undefined == file) { //如果未找到文件，结束函数，跳出
                return;
            }
            console.log("fileSize" + file.size);
            console.log(file.type);

            var r = new FileReader();
            r.readAsDataURL(file);
            r.onload = function(e) {
                var base64 = e.target.result;
                var bili = 1.5;
                console.log("压缩前：" + base64.length);
                suofang(base64, bili, returnBase64);
            }
        }

        var dealChange = function(blob, base64) {
            var fd = new FormData();
            fd.append("file", blob); //fileData为自定义

            $.ajax({
                type: "post",
                url: Lara.ImgUploadUrl,
                async: true,
                data: fd,
                processData: false,
                contentType: false,
                success: function(data) {
                    var range = quill.getSelection();
                    quill.insertEmbed(range.index, 'image', data.url);
                }
            });
        }

        var suofang = function(base64, bili, callback) {
            console.log("执行缩放程序,bili=" + bili);
            //处理缩放，转格式
            var _img = new Image();
            _img.src = base64;
            _img.onload = function() {
                var _canvas = document.createElement("canvas");
                var w = this.width / bili;
                var h = this.height / bili;
                _canvas.setAttribute("width", w);
                _canvas.setAttribute("height", h);
                _canvas.getContext("2d").drawImage(this, 0, 0, w, h);
                var base64 = _canvas.toDataURL("image/jpeg");
                _canvas.toBlob(function(blob) {
                    console.log(blob.size);

                    if(blob.size > 1024*1024){
                        suofang(base64, bili, callback);
                    }else{
                        callback(blob, base64);
                    }
                }, "image/jpeg");
            }
        }

        var quill = new Quill('#content', {
            modules : {
                toolbar : toolbarOptions
            },
            theme : 'snow',
            placeholder : '请输入内容'
        });

        var toolbar = quill.getModule('toolbar');
        toolbar.addHandler('image', function (){
            $('body').append('<input type="file" name="file">');
            $('input[type="file"]').on('change', function (){
                imageDeal(this, dealChange);
            }).trigger('click');
        });

        $('form').eq(1).on('submit', function (){
            var content = document.querySelector('input[name=content]');
            content.value = quill.container.firstChild.innerHTML;

            return true;
        });

    </script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
@stop

@section('content')
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">{{ isset($page) ? '编辑' : '新增' }}页面</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">管理</a>
				</li>
	            <li>
					<a href="{{ route('admin.page.index') }}">页面</a>
				</li>
				<li class="active">
				    {{ isset($page) ? '编辑' : '新增' }}
				</li>
			</ol>
		</div>
	</div>

	<div class="row">
	    <div class="col-sm-12">
            @if(isset($page))
                <form class="form-horizontal" role="form" action="{{ route('admin.page.update', $page->id) }}" method="POST">
                {{ method_field('PATCH') }}
            @else
                <form class="form-horizontal" role="form" action="{{ route('admin.page.store') }}" method="POST">
            @endif
            	{{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">

                    	@include('shared._errors')

                        <div class="card-box">
                            <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>基本信息</b></h5>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">标题</label>
                                <div class="col-md-4">
                                	<input type="text" class="form-control" name="title" placeholder="请输入标题" value="{{ $page->title or old('title') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">别名</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="alias" placeholder="请输入别名" value="{{ $page->alias or old('alias') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">内容</label>
                                <div class="col-md-10">
                                    <input type="hidden" name="content" value="">
                                    <div id="content" style="height: 200px;">{!! $page->content or '' !!}</div>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">关键词</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="keyword" placeholder="请输入关键词" value="{{ $page->keyword or old('keyword') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">描述</label>
                                <div class="col-md-6">
                                    <textarea name="description" class="form-control" rows="3" placeholder="请输入描述">{{ $page->description or old('description') }}</textarea>
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
