<a class="file-link" href="#">
	<div class="file-link__icon">
		<x-icon icon="{{ $icon }}" />
	</div>
	<div class="file-link__content">
		<div class="file-link__name">{{ $name }}</div>
		<div class="file-link__data">{{ $type }}, {{ bytes_convert($size) }}</div>
	</div>
</a>
