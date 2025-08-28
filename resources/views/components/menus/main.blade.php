<div class="main-menu__general">
    @foreach ($mainItems as $mainItem)
        <a @class([
			'main-menu__item',
			'main-menu__item_active' => $mainItem['url'] === $currentItem,
		]) href="{{ $mainItem['url'] }}">
            <x-icon icon="{{ $mainItem['icon'] }}" />
            <span>{{ $mainItem['name'] }}</span>
        </a>
    @endforeach
</div>
