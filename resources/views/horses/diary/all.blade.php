
@extends('layouts.template')

@section('page.content')

    <div class="diary">
        <div class="diary__container">
            <div class="diary__header">
                <x-breadcrumbs :items="[
					[
						'url' => '/front/pages/horses/list',
						'title' => $horse->currentOwner()->id == auth()->id() ? 'Мои лошади' : $horse->currentOwner()->name
					],
					[
						'url' => '/front/pages/horses/view',
						'title' => $horse->name
					]
				]" />

                <h2 class="diary__title">Дневник <span class="diary__title_counter">{{$diaries->count()}}</span></h2>

                <div class="diary__header-actions">
                    <div class="diary__actions-filter">
{{--                        <x-button-tabs size="adaptive" :tabs="[--}}
{{--						    [--}}
{{--						        'name' => 'С конца',--}}
{{--						        'url' => '#',--}}
{{--						        'active' => true,--}}
{{--						    ],--}}
{{--						    [--}}
{{--						        'name' => 'С начала',--}}
{{--						        'url' => '#',--}}
{{--						    ],--}}
{{--						    [--}}
{{--						        'name' => 'По лайкам',--}}
{{--						        'url' => '#',--}}
{{--						    ],--}}
{{--						]" />--}}
                        <x-button class="d-none-w d-none-l" size="adaptive" color="white" has-border icon="filter-solid" @click="openModal('diary-filter')">Открыть фильтры</x-button>
                    </div>
                    <x-link class="w-100-p" href="/front/pages/diary/create-form" button icon="plus-solid">Написать в дневник</x-link>
                </div>
            </div>

            <x-paginator :model="$diaries" />
{{--            @include('site.blocks.paginator')--}}

            <x-right-sidebar-blocks.sidebar-banner class="d-none-d d-block-m" />

{{--            @for ($i = 0; $i < 5; $i++)--}}
{{--                <x-feed-blocks.post-card href="/front/pages/diary/post-view" :user="fake()->human(0)" :post="fake()->post()" alert-message="Пост не опубликован и виден только вам" />--}}
{{--            @endfor--}}

{{--            @include('site.blocks.paginator')--}}

{{--            <x-feed-blocks.banner />--}}
        </div>
        <div class="diary__sidebar">
{{--            <x-right-sidebar-blocks.filter name="diary-filter">--}}
{{--                <x-forms.select name="type">--}}
{{--                    <option>Обо всём</option>--}}
{{--                    <option>Второе значение</option>--}}
{{--                    <option>Третье значение</option>--}}
{{--                    <option>Четвёртое значение</option>--}}
{{--                </x-forms.select>--}}
{{--            </x-right-sidebar-blocks.filter>--}}

            <x-right-sidebar-blocks.sidebar-banner class="d-none-m" />
        </div>
    </div>

@endsection
