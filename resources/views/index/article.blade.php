
@extends('layouts.main')
@section('title', $article->title.' - '.$article->category->name)

@section('content')
	<article>
		<header class="entry-header">
			<h1 class="entry-title"><a href="{{ $article->getLinkUrl() }}" title="{{ $article->title }}" rel="bookmark">{{ $article->title }}</a></h1>
		</header>

		<div class="entry-content">{!! $article->content !!}</div>

		@include('index._tag', ['val'=> $article])
	</article>

	<nav class="nav-single">
		<div class="prev">上一篇：{!! $article->getPrev() !!}</div>
		<div class="prev">下一篇：{!! $article->getNext() !!}</div>
	</nav>

	<div id="comments" class="comments-area">
		@if(!$article->comment->count())
			<h2 class="comments-title">《<span>{{ $article->title }}</span>》上暂无评论!</h2>
		@else
			<h2 class="comments-title">《<span>{{ $article->title }}</span>》上有&nbsp;{{ $article->comment->count() }}&nbsp;条评论!</h2>
			<ol class="commentlist" id="commentWraper">
				@foreach($article->comment as $val)
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
			<form action="{{ route('comment', $article->id) }}" method="post" id="commentform">
				{{ csrf_field() }}
				<p class="comment-form-comment"><label for="comment">评论</label><textarea id="body" name="content" cols="45" rows="8" aria-required="true">{{ old('content') or ''}}</textarea></p>
				<p class="form-submit">
					<input type="submit" id="submit" value="发表评论" />
				</p>
			</form>
		</div>
	</div>
@stop