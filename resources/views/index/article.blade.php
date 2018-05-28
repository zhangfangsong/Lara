
@extends('layouts.main')
@section('title', $article->title.' - '.$article->category->name)

@section('content')
	<article>
		<header class="entry-header">
			<h1 class="entry-title"><a href="{{ $article->getLinkUrl() }}" title="{{ $article->title }}" rel="bookmark">{{ $article->title }}</a></h1>
		</header>

		<div class="entry-content">{!! $article->content !!}</div>

		<footer class="entry-meta">
			发布于 <a href="" rel="bookmark"><time class="entry-date" datetime="">2018-2-12</time></a>。 属于 <a href="" title="" rel="category">{{ $article->category->name }}</a> 分类
			，被贴了&nbsp;
			<a href="" rel="tag">123</a>&nbsp;
		</footer>
	</article>

	<nav class="nav-single">
		<div class="prev">上一篇：{!! $article->getPrev() !!}</div>
		<div class="prev">下一篇：{!! $article->getNext() !!}</div>
	</nav>

	<div id="comments" class="comments-area">
		@if(count($article->comments))
		<h2 class="comments-title">《<span>{{ $article->title }}</span>》上暂无评论!</h2>
		@else
		<h2 class="comments-title">《<span>{{ $article->title }}</span>》上有&nbsp;{{ $article->comments->count() }}&nbsp;条评论!</h2>
		<ol class="commentlist" id="commentWraper">
			@foreach($article->comments as $val)
			<li class="comment even thread-even depth-0" id="li-comment-6">
				<article id="comment-6" class="comment">
					<header class="comment-meta comment-author vcard"><img src="{{ $val->user->avatar }}" class="photo" height="44" width="44"/><cite class="fn">{{ $val->user->username }} </cite><time datetime="">{{ $val->created_at->diffForHumans() }}</time></header>
					<section class="comment-content comment" style="margin-bottom:10px;line-height:25px;">{{ $val->content }}</section>
				</article>
			</li>
			@endforeach
		</ol>
		@endif
		<div id="respond">
			<h3 id="reply-title">发表评论 <small><a rel="nofollow" id="cancel-comment-reply-link" href="" style="display:none;">取消回复</a></small></h3>
			<form action="" method="post" id="commentform" class="J-ajax-form">
				<input type="hidden" name="article_id" value="{{ $article->id }}">

				<p class="comment-form-comment"><label for="comment">评论</label><textarea id="body" name="content" cols="45" rows="8" aria-required="true"></textarea></p>
				<p class="form-submit">
					<input type="submit" id="submit" value="发表评论" />
				</p>
			</form>
		</div>
	</div>
@stop