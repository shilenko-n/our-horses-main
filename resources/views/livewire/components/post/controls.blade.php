<div
    @class([
        'post-controls'
    ])
>
    <x-post.button
        :active="$liked"
        icon="heart-solid"
        wire:click="react"
    >
        {{ $likes ?: '0' }}
    </x-post.button>

    <x-post.button
        icon="comments-solid"
    >
        {{ $comments ?: '0' }}
    </x-post.button>

    <x-post.button
        icon="bookmark-solid"
    >
        {{ $bookmarks ?: '0' }}
    </x-post.button>

    @if ($showViews)
        <x-post.button
            icon="eye-solid"
            disabled
        >
            {{ $views ?: '0' }}
        </x-post.button>
    @endif

{{--    <div--}}
{{--        class="post-controls__ago"--}}
{{--    >{{ $timestamp->locale('ru_RU')->diffForHumans() }}</div>--}}
</div>
