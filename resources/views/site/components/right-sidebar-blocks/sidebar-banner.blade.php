<picture {{ $attributes->class(['sidebar-banner', 'sidebar-banner_phone' => $isMobile]) }}>
	<source media="(max-width: 768px)" srcset="{{ asset($sources[0]) }}">
	<source media="(min-width: 769px) and (max-width: 1280px)" srcset="{{ asset($sources[1]) }}">
	<source media="(min-width: 1281px) and (max-width: 1600px)" srcset="{{ asset($sources[2]) }}">
	<img src="{{ asset($sources[3]) }}" />
</picture>
