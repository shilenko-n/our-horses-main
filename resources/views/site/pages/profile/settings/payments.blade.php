@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="settings">
		<div class="payment-settings">
			<div class="payment-settings__header">
				<x-breadcrumbs :items="[['title' => 'Настройки', 'url' => '/front/pages/profile/settings']]" />
				<h2 class="payment-settings__title">Оплата и баланс</h2>
			</div>

			<div class="payment-settings__block">
				<div class="payment-settings__balance">
					<div class="payment-settings__current-balance">
						<div class="payment-settings__current-balance-title">Текущий баланс</div>
						<div class="payment-settings__current-balance-amount">1 250 ₽</div>
					</div>
					<div class="payment-settings__top-up-balance">
						<div class="payment-settings__top-up-balance-title">Пополнение баланса</div>
						<div class="payment-settings__top-up-balance-form">
							<div class="payment-settings__top-up-balance-input">
								<x-forms.input type="number" placeholder="300" />
							</div>
							<x-button icon="coin-solid">Пополнить</x-button>
						</div>
					</div>
				</div>
			</div>

			<div class="payment-settings__block">
				<div class="payment-settings__block-title">Привязанные банковские карты</div>
				<div class="payment-settings__payment-cards-wrapper">
					<div class="payment-settings__payment-cards">
						<a class="payment-settings__payment-card payment-settings__payment-card_new" href="#">
							<div class="payment-settings__payment-card-icon">
								<x-icon icon="plus-regular" />
							</div>
							<div class="payment-settings__payment-card_new-text">Новая карта</div>
						</a>
						<a class="payment-settings__payment-card" href="#">
							<div class="payment-settings__payment-number-type">
								<div class="payment-settings__payment-card-number">**** 4549</div>
								<div class="payment-settings__payment-card-type">VISA</div>
							</div>
							<div class="payment-settings__payment-card-valid-thru">Действителен до 11/25</div>
							<div class="payment-settings__payment-card-delete">
								<x-button is-block size="small" color="white" icon="times-regular">Отвязать</x-button>
							</div>
						</a>
						<a class="payment-settings__payment-card" href="#">
							<div class="payment-settings__payment-number-type">
								<div class="payment-settings__payment-card-number">**** 8594</div>
								<div class="payment-settings__payment-card-type">Мир</div>
							</div>
							<div class="payment-settings__payment-card-valid-thru">Действителен до 04/30</div>
							<div class="payment-settings__payment-card-delete">
								<x-button is-block size="small" color="white" icon="times-regular">Отвязать</x-button>
							</div>
						</a>
					</div>
				</div>
			</div>

			<div class="payment-settings__block">
				<div class="payment-settings__block-title">История платежей</div>
				<div class="payment-settings__table">
					<div class="payment-settings__table-header">
						<div class="payment-settings__table-th">Время</div>
						<div class="payment-settings__table-th">Карта</div>
						<div class="payment-settings__table-th">Основание</div>
						<div class="payment-settings__table-th payment-settings__table-cell_right">Сумма, ₽</div>
					</div>
					<div class="payment-settings__table-body">
						@for ($i = 0; $i < 5; $i++)
							<div class="payment-settings__table-tr">
								<div class="payment-settings__table-td">
									<div class="payment-settings__table-th_mobile">Время</div>
									<div class="payment-settings__table-cell">23.11.2022 13:06</div>
								</div>
								<div class="payment-settings__table-td">
									<div class="payment-settings__table-th_mobile">Карта</div>
									<div class="payment-settings__table-cell">*** 4549 VISA</div>
								</div>
								<div class="payment-settings__table-td">
									<div class="payment-settings__table-th_mobile">Основание</div>
									<div class="payment-settings__table-cell">Оплата <br class="d-block-p">премиум-аккаунта</div>
								</div>
								<div class="payment-settings__table-td">
									<div class="payment-settings__table-th_mobile">Сумма, ₽</div>
									<div class="payment-settings__table-cell payment-settings__table-cell_right">700</div>
								</div>
							</div>
						@endfor
					</div>
				</div>

				<div class="payment-settings__paginator">
					@include('site.blocks.paginator')
				</div>
			</div>
		</div>
	</div>
@stop
