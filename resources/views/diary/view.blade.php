
@extends('layouts.template')


@section('page.content')

    <div class="diary diary_single">
        <div class="diary__container diary__container_post">
            <div class="post">
                <div class="post__header">
                    <div class="post__header-meta">
                        <div class="post__header-info">
                            {{-- blade-formatter-disable --}}
                            <x-breadcrumbs :items="[
								[
									'url' => '/front/pages/horses/list',
									'title' => 'Мои лошади'
								],
								[
									'url' => '',
									'title' => $blog->horse->name,
								],
								[
									'url' => '/front/pages/diary/view',
									'title' => 'Дневник'
								]
							]" />
                            {{-- blade-formatter-enable --}}
                            <h2 class="post__title">Всероссийские гонки</h2>
                            {{-- blade-formatter-disable --}}
{{--                            <x-post-controls--}}
{{--                                :liked="fake()->boolean(20)"--}}
{{--                                :likes="fake()->numberBetween(0, 100)"--}}
{{--                                :comments="fake()->numberBetween(0, 100)"--}}
{{--                                :views="fake()->numberBetween(0, 100)"--}}
{{--                                :bookmarks="fake()->numberBetween(0, 30)"--}}
{{--                                :timestamp="now()->setTimestamp(fake()->dateTimeThisYear()->getTimestamp())"--}}
{{--                                show-views--}}
{{--                            />--}}
                            {{-- blade-formatter-enable --}}
                        </div>
                        @if(auth()->check() && $blog->user->id == auth()->id())
                            <div class="post__header-actions">
                                <x-link class="w-100-p" href="/front/pages/diary/edit-form" button icon="pencil-alt-solid">Редактировать</x-link>
                                <x-button class="w-100-p" color="pale" icon="times-solid">Удалить</x-button>
                            </div>
                        @endif
                    </div>
{{--                    @php($horse = fake()->horse(0))--}}

                    <x-user.mini-card
                        class="post__user"
                        :href="route('pages.user.profile.show', $blog->user->nickname)"
                        :nickname="$blog->user->nickname"
                        :username="$blog->user->getFullName()"
                        :photo="$blog->user->getAvatarUrl()"
                    />
                    @if(!$blog->published)
                        <x-forms.alert type="warning">Пост не опубликован и виден только вам</x-forms.alert>
                    @endif
                </div>
                <x-share />

                <div class="post__content">
                    @foreach($blocks as $block)

                        @switch($block->type)

                            @case('text')
                                <x-post.text>
                                    {!! $block->content !!}
                                </x-post.text>
                                @break

                            @case('image')
                                <x-post.image
                                    :src="$block->getFirstMedia('images')->getUrl()"
                                    :title="$block->title"
                                />
                                @break

                            @case('gallery')
                                <x-post.gallery
                                    name="post"
                                    :block="$block"
                                />
                                @break

                        @endswitch

                    @endforeach

{{--                    <figure>--}}
                        {{-- blade-formatter-disable --}}
{{--                        <x-video--}}
{{--                            :poster-phone="asset('img/layout/post/video/p.jpg')"--}}
{{--                            :poster-tablet="asset('img/layout/post/video/t.jpg')"--}}
{{--                            :poster-laptop="asset('img/layout/post/video/l.jpg')"--}}
{{--                            :poster="asset('img/layout/post/video/w.jpg')"--}}
{{--                        >--}}
{{--                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/DppVAQqaNE4?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>--}}
{{--                        </x-video>--}}
                        {{-- blade-formatter-enable --}}
{{--                        <figcaption>Конные скачки в Москве, май 2022 года</figcaption>--}}
{{--                    </figure>--}}
                </div>

                <div class="post__footer">
                    <div class="post__footer-meta">
                        {{-- blade-formatter-disable --}}
{{--                        <x-post-controls--}}
{{--                            class="post__footer-info"--}}
{{--                            :liked="fake()->boolean(20)"--}}
{{--                            :likes="fake()->numberBetween(0, 100)"--}}
{{--                            :comments="fake()->numberBetween(0, 100)"--}}
{{--                            :views="fake()->numberBetween(0, 100)"--}}
{{--                            :bookmarks="fake()->numberBetween(0, 30)"--}}
{{--                            :timestamp="now()->setTimestamp(fake()->dateTimeThisYear()->getTimestamp())"--}}
{{--                            show-views--}}
{{--                        />--}}
                        {{-- blade-formatter-enable --}}

                        @if(auth()->check() && $blog->user->id == auth()->id())
                            <x-button class="w-100-p" icon="pencil-alt-solid">Редактировать</x-button>
                            <x-button class="w-100-p" color="pale" icon="times-solid">Удалить</x-button>
                        @endif
                    </div>

                    <x-user.mini-card
                        class="post__user"
                        :href="route('pages.user.profile.show', $blog->user->nickname)"
                        :nickname="$blog->user->nickname"
                        :username="$blog->user->getFullName()"
                        :photo="$blog->user->getAvatarUrl()"
                    />
                </div>

                <x-share />
            </div>

            <div class="diary__buy-horses">
                <h2>Лошади в продаже</h2>
                <div class="diary__buy-horses-items">
                    <livewire:components.horses.small-card
                        :horse="$blog->horse"
                    />
{{--                    <x-horse.small-card href="/front/pages/horses/view" :horse="fake()->horse()" price="{{ fake()->boolean() ? fake()->numberBetween(500000, 5000000) : 0 }}" />--}}
{{--                    <x-horse.small-card href="/front/pages/horses/view" :horse="fake()->horse()" price="{{ fake()->boolean() ? fake()->numberBetween(500000, 5000000) : 0 }}" />--}}
{{--                    <x-horse.small-card href="/front/pages/horses/view" :horse="fake()->horse()" price="{{ fake()->boolean() ? fake()->numberBetween(500000, 5000000) : 0 }}" />--}}
                </div>
            </div>

{{--            @include('site.blocks.comments')--}}
        </div>
    </div>

@endsection
