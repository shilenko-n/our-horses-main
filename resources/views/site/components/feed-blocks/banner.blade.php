<picture class="post-banner">
	<source media="(max-width: 767px)" srcset="{{ asset($sources[0]) }}">
	<source media="(min-width: 768px) and (max-width: 1279px)" srcset="{{ asset($sources[1]) }}">
	<source media="(min-width: 1280px) and (max-width: 1600px)" srcset="{{ asset($sources[2]) }}">
	<img src="{{ asset($sources[3]) }}">
</picture>
