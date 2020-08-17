@foreach($list as $val)
	<article>
		<header class="entry-header">
			<h1 class="entry-title"><a href="{{ $val->getLinkUrl() }}" title="{{ $val->title }}" rel="bookmark">{{ $val->title }}</a></h1>
		</header>
		
		@if($val->thumb)
			<div class="flex">
				<div class="flex-img mr-20">
					<img src="{{ $val->thumb }}" alt="{{ $val->title }}" class="flex-img flex-rounded">
				</div>
				<div class="entry-content">{{ $val->description }}</div>
			</div>
		@else
			<div class="entry-content">{{ $val->description }}</div>
		@endif
		
		@include('index._tag', ['val'=> $val])
	</article>
@endforeach