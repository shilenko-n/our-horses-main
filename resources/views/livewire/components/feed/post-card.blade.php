<a
    @class([
        'post-card',
        'post-card_shadow' => $shadow ?? false,
    ])
>
    @if($newsLine)
        <div class="post-card__user">
            <object>
                <x-user.mini-card
                    class="post__user"
                    href="{{route('pages.user.profile', $blog->user->nickname)}}"
                    :nickname="$blog->user->nickname"
                    :username="$blog->user->name"
                    photo="{{ $blog->user->getAvatarUrl() }}"
                />
            </object>
        </div>
    @else
        <div class="post-card__user">
            <object>
                <x-user.mini-card
                    href="/front/pages/profile/user/view"
                    username="{{ $blog->user->name }}"
                    photo="{{ $blog->user->getAvatarUrl() }}"
                    location="{{ $blog->user->location() }}"
                />
            </object>
        </div>
    @endif



    @if ($alertMessage)
        <div class="post-card__alert">
            <x-forms.alert>{{ $alertMessage }}</x-forms.alert>
        </div>
    @endif

    <div class="post-card__slider">
        <x-slider>
{{--            @foreach ($post['slider'] as $slide)--}}
{{--                <x-slider.slide>--}}
{{--                    <picture>--}}
{{--                        <source media="(max-width: 768px)" srcset="{{ $slide['p'] }}" />--}}
{{--                        <source media="(min-width: 769px) and (max-width: 1280px)" srcset="{{ $slide['t'] }}" />--}}
{{--                        <img src="{{ $slide['d'] }}">--}}
{{--                    </picture>--}}
{{--                </x-slider.slide>--}}
{{--            @endforeach--}}
        </x-slider>
    </div>
    <div class="post-card__text">
        <h3 class="post-card__heading">{{ $blog->title }}</h3>

        <div class="post-card__announcement">asdasd</div>

        <div class="post-card__controls">
            {{-- blade-formatter-disable --}}
{{--            <x-post-controls--}}
{{--                :liked="fake()->boolean(20)"--}}
{{--                :likes="fake()->numberBetween(0, 100)"--}}
{{--                :comments="fake()->numberBetween(0, 100)"--}}
{{--                :views="fake()->numberBetween(0, 100)"--}}
{{--                :bookmarks="fake()->numberBetween(0, 30)"--}}
{{--                :timestamp="now()->setTimestamp(fake()->dateTimeThisYear()->getTimestamp())"--}}
{{--                show-views--}}
{{--            />--}}
            {{-- blade-formatter-enable --}}
        </div>

        @if ($showButtons)
            <div class="post-card__buttons">
                <x-button color="pale" icon="minus-solid">Из самого интересного</x-button>
            </div>
        @endif
    </div>
    <div class="post-card__comments">
        @for ($i = 0; $i < 3; $i++)

{{--            <x-post-comment photo="{{ fake()->human()['photo'] }}">{{ fake()->comment() }}</x-post-comment>--}}
        @endfor
    </div>
</a>
