<a href="{{ asset($big ?: $small) }}" @class([ 'gallery__link', $attributes->get('class') ])>
	<img src="{{ asset($small) }}" class="gallery__image" {{ $attributes->merge(['alt' => null]) }}>
</a>
