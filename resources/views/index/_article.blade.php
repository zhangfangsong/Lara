
@foreach($list as $val)
<article>
	<header class="entry-header">
		<h1 class="entry-title"><a href="{{ $val->getLinkUrl() }}" title="{{ $val->title }}" rel="bookmark">{{ $val->title }}</a></h1>
	</header>

	@if($val->thumb)
		<div class="entry-content">
			<img src="{{ $val->thumb }}" alt="{{ $val->title }}" width="700">
		</div>
	@endif
	
	<div class="entry-content">{{ $val->description }}</div>
	
	@include('index._tag', ['val'=> $val])
</article>
@endforeach
