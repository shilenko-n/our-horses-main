<div {{ $attributes->class(['feed-with-title']) }}>
	<h2 class="feed-with-title__heading">{{ $title }}</h2>
	<div class="feed-with-title__feed {{ $isGrid ? 'feed-with-title__feed_grid' : '' }}">
		{{ $slot }}
	</div>
</div>
