
@foreach($list as $val)
<article>
	<header class="entry-header">
		<h1 class="entry-title"><a href="{{ $val->getLinkUrl() }}" title="{{ $val->title }}" rel="bookmark">{{ $val->title }}</a></h1>
	</header>

	<div class="entry-content">{{ $val->description }}</div>

	<footer class="entry-meta">
		发布于 <a href="" title="" rel="bookmark"><time class="entry-date" datetime="">2018-2-12</time></a>。 属于 <a href="{{ $val->category->getLinkUrl() }}" title="查看 {{ $val->category->name }}中的全部文章" rel="category">{{ $val->category->name }}</a> 分类，被贴了
		@foreach($val->keyword as $v)
		@if($loop->first)
			<a href="" rel="tag">标签</a>
		@else
			- <a href="" rel="tag">{{ $v }}</a>
		@endif
		@endforeach标签
	</footer>
</article>
@endforeach
