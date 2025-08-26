<div class="comments" id="comment-block">
	<div class="comments__content">
		<h2>Комментарии <span class="c-hint">12</span></h2>

		@if (session('auth'))
			<x-comment.form />
		@endif

		@if (count($comments ?? []))
			<div class="comments__comments">
				@foreach ($comments as $comment)
					<x-comment.comment :$comment />
				@endforeach
			</div>
		@endif

		<x-button size="big" color="pale" icon="chevron-down-solid" is-block>Показать ещё комментарии</x-button>
	</div>
	<div class="comments__banner">
		<x-right-sidebar-blocks.sidebar-banner />

		<div class="comments__up-button">
			<x-link button href="#comment-block" color="white" icon="chevron-up-solid">К началу комментариев</x-link>
		</div>
	</div>
</div>
