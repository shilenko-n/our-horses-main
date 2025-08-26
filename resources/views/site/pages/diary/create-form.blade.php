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
							'url' => '/front/pages/horses/list',
							'title' => 'Мои лошади'
						],
						[
							'url' => '/front/pages/horses/view',
							'title' => $horse['name']
						],
						[
							'url' => '/front/pages/diary/view',
							'title' => 'Дневник'
						]
					]" />
					{{-- blade-formatter-enable --}}
					<h2>Новая запись</h2>
				</div>

				<div class="diary-form__content">
					<div class="diary-form__form">
						<div class="diary-form__input-group">
							<x-forms.input size="big" label="Заголовок" required />
							<x-forms.select size="big" label="Тема" required>
								<option>Не выбрана</option>
								<option>Соревнования</option>
								<option>Здоровье</option>
							</x-forms.select>
						</div>
						<x-add-post-block />
					</div>
					<div class="diary-form__flags">
						<x-forms.flag type="checkbox" label="Разрешить комментарии" />
						<x-forms.flag type="checkbox" label="Опубликовать пост" />
					</div>
					<div class="diary-form__footer">
						<x-link disabled button size="big" icon="check-solid" href="/front/pages/diary/edit-form">Добавить запись</x-link>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
