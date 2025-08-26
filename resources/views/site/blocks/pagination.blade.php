@if ($paginator->hasPages())
	<nav class="pagination" aria-label="Навигация по страницам">
        {{-- Previous Page Link --}}
		@if ($paginator->onFirstPage())
			<div class="pagination__page pagination__page_prev" aria-disabled="true"></div>
		@else
			<a class="pagination__page pagination__page_link pagination__page_prev" href="{{ $paginator->previousPageUrl() }}" rel="prev"></a>
		@endif

		{{-- Pages --}}
		{{-- $ranges из PaginateComposer --}}
		@foreach ($ranges as $range)
			@foreach ($range as $page => $url)
				@if ($paginator->currentPage() == $page)
					<div class="pagination__page pagination__page_current" aria-disabled="true">{{ $page }}</div>
				@else
					<a class="pagination__page pagination__page_link" href="{{ $url }}">{{ $page }}</a>
				@endif
			@endforeach

			@if (!$loop->last)
				<div class="pagination__page pagination__page_dots" aria-disabled="true">...</div>
			@endif
		@endforeach

        {{-- Next Page Link --}}
		@if ($paginator->hasMorePages())
			<a class="pagination__page pagination__page_link pagination__page_next" href="{{ $paginator->nextPageUrl() }}" rel="next"></a>
		@else
			<div class="pagination__page pagination__page_next" aria-disabled="true"></div>
		@endif
	</nav>
@endif
