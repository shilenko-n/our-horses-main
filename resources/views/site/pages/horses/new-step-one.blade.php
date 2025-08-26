@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="horse-form">
		<div>
			<x-breadcrumbs :items="[['url' => '/front/pages/horses/list', 'title' => 'Мои лошади']]" />
			<h2 class="horse-big-card__title">Новая лошадь</h2>
		</div>
		<div class="horse-form__inputs">
			<div class="w-100">
				<x-forms.input size="big" type="number" label="Номер чипа" required placeholder="XXXXXXXXXXXXXXX" />
			</div>
			<div class="w-100">
				<x-forms.input size="big" label="Дата покупки" required type="date" />
			</div>
		</div>
		<x-alert type="warning" url="/front/pages/horses/guest">Лошадь с таким чипом уже есть в базе «Наши кони». Если это ваша лошадь, используйте кнопку «Это моя лошадь» <b>на странице лошади Изольда</b>, чтобы стать ее владельцем.</x-alert>
		<x-link class="w-100-p" href="/front/pages/horses/new-step-two" button size="big" icon="chevron-right-solid">Следующий шаг</x-link>
	</div>
@stop
