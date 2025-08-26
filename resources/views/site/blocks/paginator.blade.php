<div class="paginator {{ $center ?? false ? 'paginator_center' : '' }}">
	<x-tab href="#" is-square icon="chevron-left-solid" />
	<x-tab href="#" is-square is-selected>1</x-tab>
	<x-tab href="#" is-square>2</x-tab>
	<x-tab href="#" is-square>3</x-tab>
	<x-tab href="#" is-square>...</x-tab>
	<x-tab href="#" is-square>259</x-tab>
	<x-tab href="#" is-square icon="chevron-right-solid" />
	{{-- <a class="paginator__item" href="#">
		<x-icon icon="chevron-left-solid" />
	</a>
	<a class="paginator__item paginator__item_active" href="#">1</a>
	<a class="paginator__item" href="#">2</a>
	<a class="paginator__item" href="#">3</a>
	<a class="paginator__item" href="#">...</a>
	<a class="paginator__item" href="#">259</a>
	<a class="paginator__item" href="#">
		<x-icon icon="chevron-right-solid" />
	</a> --}}
</div>
