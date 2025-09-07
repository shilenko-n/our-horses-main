@props([
    'name' => 'default'
])

<div
    {{
        $attributes->class([
            'swiper-slider swiper-slider_' . $name
        ])
    }}>
    <div class="swiper">
        <div class="swiper-wrapper">
            {{ $slot }}
        </div>

        <div class="swiper-arrows">
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
        </div>

    </div>
</div>
