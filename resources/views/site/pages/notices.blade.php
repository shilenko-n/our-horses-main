@extends('site.layout.template-without-footer')

@section('page.title', 'Уведомления')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="notices">
		<h2 class="notices__header">Уведомления</h2>

		<div class="notices__list">
			{{-- blade-formatter-disable --}}
				@php(
					$notices = [
						[
							'read' => false,
							'icon' => 'cake-solid',
							'timestamp' => now()->subMinutes(3),
                            'message' => 'Сегодня день рождения у пользователя <strong>Анжела Романова</strong>',
						],
						[
							'read' => false,
							'icon' => 'heart-solid',
							'timestamp' => now()->subHours(11),
                            'message' => '<strong>Роман Романов</strong> нравится ваша запись <strong>Всероссийские гонки</strong>',
						],
						[
							'read' => false,
							'icon' => 'at-solid',
							'timestamp' => now()->subHours(17),
                            'message' => '<strong>Роман Романов</strong> упомянул вашу лошадь <strong>Изольда</strong> в своей записи <strong>Изумительная и прекрасная</strong>',
						],
						[
							'read' => false,
							'icon' => 'user-plus-solid',
							'timestamp' => now()->subHours(19),
                            'message' => '<strong>Алексей Усов</strong> подписался на ваш блог',
						],
						[
							'read' => true,
							'icon' => 'user-plus-solid',
							'timestamp' => now()->subDays(1)->setHours(13)->setMinutes(5),
                            'message' => '<strong>Алексей Усов</strong> подписался на ваш блог',
						],
						[
							'read' => true,
							'icon' => 'envelope-solid',
							'timestamp' => now()->subDays(1)->setHours(10)->setMinutes(39),
                            'message' => '<strong>Пётр Петров</strong> написал вам сообщение',
						],
						[
							'read' => true,
							'icon' => 'exclamation-circle-solid',
							'timestamp' => now()->subDays(1)->setHours(8)->setMinutes(32),
                            'message' => 'Ваша заявка на добавление лошади <strong>Офелия</strong> одобрена',
						],
						[
							'read' => true,
							'icon' => 'exclamation-circle-solid',
							'timestamp' => now()->subDays(3)->setHours(11)->setMinutes(11),
                            'message' => 'Срок размещения объявления о продаже лошади <strong>Изольда</strong> закончится через 5 дней. По истечение срока объявление необходимо продлить в разделе <strong>редактирование лошади</strong>',
						],
						[
							'read' => true,
							'icon' => 'exclamation-circle-solid',
							'timestamp' => now()->subYear(1)->setMonth(11)->setDays(23)->setHours(20)->setMinutes(29),
                            'message' => 'Ваша заявка на добавление лошади <strong>Гериол</strong> требует доработки',
						],
					]
				)
			{{-- blade-formatter-enable --}}
			@foreach ($notices as $notice)
				<x-notice :is-read="$notice['read']" :icon="$notice['icon']" :timestamp="$notice['timestamp']">{!! $notice['message'] !!}</x-notice>
			@endforeach
		</div>

		@include('site.blocks.paginator')
	</div>
@stop
