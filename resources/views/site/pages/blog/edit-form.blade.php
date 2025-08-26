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
						[
							'url' => '/front/pages/blog/post-view',
							'title' => 'Всероссийские гонки'
						],
					]" />
					{{-- blade-formatter-enable --}}
					<h2>Редактирование записи</h2>
				</div>

				<div class="diary-form__content">
					<div class="diary-form__form">
						<x-forms.input size="big" label="Заголовок" value="Всероссийские гонки" required />
						<div class="diary-form__blocks">
							@include('site.blocks.diary.form.photo', ['disableUp' => true])
							@include('site.blocks.diary.form.text')
							@include('site.blocks.diary.form.photo')
							@include('site.blocks.diary.form.gallery')
							@include('site.blocks.diary.form.text')
							@include('site.blocks.diary.form.video', ['disableDown' => true])
						</div>
						<x-add-post-block />
					</div>
					<div class="diary-form__flags">
						<x-forms.flag checked type="checkbox" label="Разрешить комментарии" />
						<x-forms.flag type="checkbox" label="Опубликовать пост" />
					</div>
					<div class="diary-form__footer">
						<x-button class="w-100-p" type="button" button size="big" icon="check-solid">Сохранить</x-button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
