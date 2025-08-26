<div class="newsline__interesting">
	<h2 class="newsline__interesting-heading">Самое интересное</h2>
	<div class="newsline__interesting-posts">
		@for ($i = 0; $i < 2; $i++)
			@include('site.feed.cards.post', ['shadow' => true])
		@endfor
	</div>
</div>
