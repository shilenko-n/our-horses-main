<ul class="breadcrumbs">
	@foreach($breadcrumbs as $breadcrumb)
		<li class="breadcrumbs__item">
			<a href="{{ $breadcrumb[ 'url' ] }}" class="breadcrumbs__link">
				<span>{{ $breadcrumb[ 'name' ] }}</span>
				<x-icon icon="chevron-right-regular" />
			</a>
		</li>
	@endforeach
</ul>
