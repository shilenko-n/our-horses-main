<picture>
	@if ($phone)
		<source media="(max-width: 767px)" srcset="{{ $phone }}">
	@endif

	@if ($tablet)
		<source media="(max-width: 1280px)" srcset="{{ $tablet }}">
	@endif

	@if ($laptop)
		<source media="(max-width: 1599px)" srcset="{{ $laptop }}">
	@endif

	<img src="{{ $image }}" {{ $attributes }}>
</picture>
