<div class="breadcrumbs">
    @foreach ($items as $item)
        @if (key_exists('url', $item) && $item['url'])
            <a class="breadcrumbs__item" href="{{ $item['url'] }}">
                <span>{{ $item['title'] }}</span>
                <span class="breadcrumbs__item-icon">
					<x-icon icon="chevron-right-solid" />
				</span>
            </a>
        @else
            <span class="breadcrumbs__item">
				<span>{{ $item['title'] }}</span>
				<span class="breadcrumbs__item-icon">
					<x-icon icon="chevron-right-solid" />
				</span>
			</span>
        @endif
    @endforeach
</div>
