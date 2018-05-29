
<footer class="entry-meta">
	发布于 <a href="{{ $val->getTimeUrl() }}" title="{{ $val->created_at->toDateString() }}" rel="bookmark"><time class="entry-date" datetime="{{ $val->created_at->toDateString() }}">{{ $val->created_at->toDateString() }}</time></a>。 属于 <a href="{{ $val->category->getLinkUrl() }}" title="查看 {{ $val->category->name }}中的全部文章" rel="category">{{ $val->category->name }}</a> 分类，被贴了
	@foreach($val->getTags() as $v)
		@if($loop->first)
			<a href="{{ route('tag', $v) }}" rel="tag">{{ $v }}</a>
		@else
			- <a href="{{ route('tag', $v) }}" rel="tag">{{ $v }}</a>
		@endif
	@endforeach标签
</footer>
