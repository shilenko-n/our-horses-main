<div class="mobile-menu">
	<div class="mobile-menu__items">
		<x-mobile-menu.item class="mobile-menu__item" icon="scroll-solid">Лента</x-mobile-menu.item>
		<x-mobile-menu.item class="mobile-menu__item" :items="[
		    [
		        'url' => '#',
		        'name' => 'Каталог лошадей',
		    ],
		    [
		        'url' => '#',
		        'name' => 'Купить лошадь',
		    ],
		    [
		        'url' => '/front/pages/horses/list',
		        'name' => 'Мои лошади',
		    ],
		]" icon="horse-head-solid">Лошади</x-mobile-menu.item>
		<x-mobile-menu.item class="mobile-menu__item" icon="writing-solid">Написать</x-mobile-menu.item>
		<x-mobile-menu.item class="mobile-menu__item" icon="comments-solid" count="15">Сообщения</x-mobile-menu.item>
		<x-mobile-menu.item class="mobile-menu__item" icon="ellipsis-h-solid" @click="openModal('mobile-menu')">Ещё</x-mobile-menu.item>
	</div>

	<x-modal sidebar-content name="mobile-menu">
		<div class="feed-sidebar-modal__content">
			<div class="extended-menu">
				<div class="extended-menu__user">
					@php($human = fake()->human(0))
					<x-user.mini-card href="/front/pages/profile/user/view" username="{{ $human['name'] }}" photo="{{ $human['photo'] }}" />
				</div>
				<div class="extended-menu__balance">
					<div class="extended-menu__balance-value">1 250 ₽</div>
					<x-button is-block color="pale">Пополнить</x-button>
				</div>

				<x-main-menu :is-admin="$is_admin" current-item="{{ $current_url }}" />
			</div>
		</div>
	</x-modal>
</div>
