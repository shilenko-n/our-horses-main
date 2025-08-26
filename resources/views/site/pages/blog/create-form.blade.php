@extends('site.layout.template-without-footer')

@section('page.content')
	@php($horse = fake()->horse(1))
	<div class="diary diary_single">
		<div class="diary__container">
			<div class="diary-form">
				<div class="diary-form__header">
					{{-- blade-formatter-disable --}}
					<x-breadcrumbs :items="[
						[
							'url' => '/front/pages/profile/user/view',
							'title' => fake()->human(0)['name']
						],
					]" />
					{{-- blade-formatter-enable --}}
					<h2>Новая запись</h2>
				</div>

				<div class="diary-form__content">
					<div class="diary-form__form">
						<x-forms.input size="big" label="Заголовок" required />

						<x-add-post-block />
					</div>
					<div class="diary-form__flags">
						<x-forms.flag type="checkbox" label="Разрешить комментарии" />
						<x-forms.flag type="checkbox" label="Опубликовать пост" />
					</div>
					<div class="diary-form__footer">
						<x-link disabled button size="big" icon="check-solid" href="/front/pages/blog/edit-form">Добавить запись</x-link>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
