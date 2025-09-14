@props([
    'post' => null,
    'category' => ''
])

<a
    {{ $attributes->class(['post-small-card']) }}
>
    @if($post->hasPreview())
        <picture>
            {{--        <source media="(max-width: 768px)" srcset="{{ $post['slider'][0]['p'] }}" />--}}
            <img class="post-small-card__image" src="{{$post->getPreview()->getUrl()}}" alt="" />
        </picture>
    @endif

    <div class="post-small-card__content">
        <div class="post-small-card__text">
            <h4 class="post-small-card__title">{{ $post->title }}</h4>
            <div class="post-small-card__category">{{ $category }}</div>
        </div>
        <livewire:components.post.controls
            :blog="$post"
        />
{{--        <x-post-controls--}}
{{--            :liked="fake()->boolean(20)"--}}
{{--            :likes="fake()->numberBetween(0, 100)"--}}
{{--            :comments="fake()->numberBetween(0, 100)"--}}
{{--            :views="fake()->numberBetween(0, 100)"--}}
{{--            :bookmarks="fake()->numberBetween(0, 30)"--}}
{{--            :timestamp="now()->setTimestamp(fake()->dateTimeThisYear()->getTimestamp())"--}}
{{--            show-views--}}
{{--        />--}}
    </div>
</a>
