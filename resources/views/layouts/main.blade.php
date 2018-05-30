<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="zh-CN">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="zh-CN">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="zh-CN">
<!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>@yield('title', '首页') - {{ $cfg->title }}</title>
	<meta name="keywords" content="{{ $cfg->keyword }}"/>
	<meta name="description" content="{{ $cfg->description }}" />
	<link rel="stylesheet" id="twentytwelve-style-css" href="{{ asset('front/css/index.css') }}" type="text/css" media="all" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" id="twentytwelve-ie-css"  href="{{ asset('front/css/ie.css') }}" type="text/css" media="all" />
	<![endif]-->
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
	<style type="text/css" id="custom-background-css">
		body.custom-background {background-color: #e6e6e6; }
	</style>

	<!--[if lt IE 9]>
	<script src="{{ asset('front/js/html5.js') }}" type="text/javascript"></script>
	<![endif]-->
	<script type="text/javascript" src="{{ asset('front/js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('front/js/nav.js') }}"></script>
</head>

<body class="home blog custom-background custom-font-enabled single-author">

<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="{{ route('home') }}" title="{{ $cfg->name }}" rel="home">{{ $cfg->name }}</a></h1>
			<h2 class="site-description">{{ $cfg->description }}</h2>
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<ul class="nav-menu">
				<li><a href="{{ route('home') }}">首页</a></li>
				@foreach($navs as $val)
				<li><a href="{{ $val->getLinkUrl() }}">{{ $val->name }}</a>
					<ul class="sub-menu">
						@if(isset($val->child))
							@foreach($val->child as $v)
								<li><a href="{{ $v->getLinkUrl() }}">{{ $v->name }}</a></li>
							@endforeach
						@endif
					</ul>
				</li>
				@endforeach
			</ul>
		</nav>
	</header>

	<div id="main" class="wrapper">
		<div id="primary" class="site-content">
			<div id="content" role="main">
				@yield('content')
			</div>
		</div>

		<div id="secondary" class="widget-area" role="complementary">
			<aside id="search-2" class="widget widget_search">
				<form role="search" id="searchform" action="" method="post">
					<div>
						<label class="screen-reader-text" for="s">搜索：</label>
						<input onfocus="if(this.value=='搜索神马的最有爱了'){this.value='';}" onblur="if(this.value==''){this.value='搜索神马的最有爱了';}" type="text" value="搜索神马的最有爱了" name="keywords" id="s" style="color:#aaa;"/>
						<input type="submit" class="btn btn-default" id="searchsubmit" value="搜索" />
					</div>
				</form>

				<script type="text/javascript">
					$(function (){
						$("#searchsubmit").click(function (){
							location.href = "{{ route('home') }}" + "/search/"+$("#s").val()+'.html';
							return false;
						});
					});
				</script>
			</aside>

			<aside id="recent-posts-2" class="widget widget_recent_entries">
				<h3 class="widget-title">热门文章</h3>
				<ul>
					@foreach($hot_articles as $val)
					<li><font style="color:#7a7a7a;">[{{ $loop->iteration }}]</font>&nbsp;<a href="{{ $val->getLinkUrl() }}" title="{{ $val->title }}">{{ $val->title }}</a></li>
					@endforeach
				</ul>
			</aside>

			<aside id="recent-comments-2" class="widget widget_recent_comments">
				<h3 class="widget-title">近期评论</h3>
				<ul id="recentcomments">
					@foreach($comments as $val)
					<li class="recentcomments">{{ $val->user->username }} 发表在《<a href="{{ $val->article->getLinkUrl() }}" title="{{ $val->article->title }}">{{ $val->article->title }}</a>》</li>
					@endforeach
				</ul>
			</aside>

			<aside id="archives-2" class="widget widget_archive">
				<h3 class="widget-title">文章归档</h3>
				<ul>
					@foreach($files as $val)
						<li><a href="{{ route('time', $val->pub_date) }}" title="{{ $val->pub_date }}">{{ date('Y年m月', strtotime($val->pub_date)) }}</a>&nbsp;<font style="color:#7a7a7a;">({{ $val->num }})</font></li>
					@endforeach
				</ul>
			</aside>

			<aside id="categories-2" class="widget widget_categories">
				<h3 class="widget-title">分类目录</h3>
				<ul>
					@foreach($navs as $val)
						<li class="cat-item cat-item-2"><a href="{{ $val->getLinkUrl() }}" title="{{ $val->name }}">{{ $val->name }}</a></li>
					@endforeach
				</ul>
			</aside>

			<aside id="categories-2" class="widget widget_categories">
				<h3 class="widget-title">热门标签(<font style="font-weight:normal;">字体越大表示标签越热门额</font>^-^)</h3>
				<ul>
					<li class="cat-item cat-item-2">
						@foreach($tags as $val)
						<a href="{{ $val->getLinkUrl() }}" title="{{ $val->name }}" style="font-size:{{ $val->getFontSize()  }}px;text-decoration:none;">{{ $val->name }}</a> &nbsp;
						@endforeach
					</li>
				</ul>
			</aside>
		</div>
	</div>

	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<span>友情链接：</span>
			@foreach($links as $val)
			<a href="{{ $val->url }}" {{ $val->target ? 'target="_blank"' : '' }}>{{ $val->name }}</a>
			@endforeach
		</div>
	</footer>

	<footer role="contentinfo" style="margin-top:0;">
		<div class="site-info" style="text-align:center;">
			<span>{{ $cfg->icp }}</span>
			<span style="position:relative;top:2px;">{!! $cfg->code !!}</span>
		</div>
	</footer>

</div>

</body>
</html>