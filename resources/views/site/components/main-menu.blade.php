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
<div class="main-menu__my">
	<div class="main-menu__my-title">Моё</div>
	<div class="main-menu__my-items">
		@foreach ($myItems as $myItem)
			<a @class([
				'main-menu__item',
				'main-menu__item_active' => $myItem['url'] === $currentItem,
			]) href="{{ $myItem['url'] }}">
				<x-icon icon="{{ $myItem['icon'] }}" />
				<span>{{ $myItem['name'] }}</span>
			</a>
		@endforeach
	</div>
</div>
@if ($isAdmin ?? false)
	<div class="main-menu__my">
		<div class="main-menu__my-title">Администратор</div>
		<div class="main-menu__my-items">
			@foreach ($adminItems as $adminItem)
				<a @class([
					'main-menu__item',
					'main-menu__item_active' => $adminItem['url'] === $currentItem,
				]) href="{{ $adminItem['url'] }}">
					<x-icon icon="{{ $adminItem['icon'] }}" />
					<span>{{ $adminItem['name'] }}</span>
				</a>
			@endforeach
		</div>
	</div>
@endif

@include('site.blocks.footer', ['sidebar' => true])
