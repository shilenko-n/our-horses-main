<x-modal name="contacts">
	<div class="modal_contacts__container">
		{{-- Контакты --}}
		<div class="modal_contacts__contacts">
			<h2>Контакты</h2>

			<x-link
				icon="mobile-alt-solid"
				href="tel:+71234567890"
				class="contact"
			>
				+7 123 456-78-90
			</x-link>

			<x-link
				icon="envelope-solid"
				href="mailto:example@example.com"
				class="contact"
			>
				example@example.com
			</x-link>


            <div class="contact">
				<x-icon icon="clock-solid" />
                <p>С 9:00 до 19:00 без выходных.</p>
            </div>

            <div class="contact">
				<x-icon icon="map-marker-solid" />
                <p>194021, Россия, Санкт-Петербург, ул. Политехническая, д. 6, стр. 1, пом. Н-7</p>
            </div>

            {{-- Сервисы яндекса --}}
            @php($latitude = 59.99347068564468)
            @php($longitude = 30.356901027306236)
            @if($latitude && $longitude)
                <div class="yandex-services">
                    {{-- Taxi --}}
                    <a
                        id="taxi"
                        href="https://3.redirect.appmetrica.yandex.com/route?end-lat={{ $latitude }}&amp;end-lon={{ $longitude }}&amp;ref=2360330&amp;appmetrica_tracking_id=1178268795219780156"
                        target="_blank"
						data-ym-goal="taxi"
                    >
                        <img src="{{ asset('img/yandex/ya-taxi-icon.svg') }}" aria-hidden="true">
                        <span>Вызвать такси</span>
                    </a>
                    {{-- Map --}}
                    <a
                        id="show-map"
                        href="https://yandex.ru/maps/?pt={{ $longitude }},{{ $latitude }}&amp;z=16&amp;l=map"
                        target="_blank"
						data-ym-goal="show-map"
                    >
                        <img src="{{ asset('img/yandex/ya-map-icon.svg') }}" aria-hidden="true">
                        <span>Посмотреть на&nbsp;карте</span>
                    </a>
                    {{-- Navigation --}}
                    <a
                        id="navigation"
                        href="yandexnavi://build_route_on_map?lat_to={{ $latitude }}&amp;lon_to={{ $longitude }}"
                        class="none-d"
						data-ym-goal="navigation"
                    >
                        <img src="{{ asset('img/yandex/ya-nav-icon.svg') }}" aria-hidden="true">
                        <span>Открыть навигатор</span>
                    </a>
                </div>
            @endif
		</div>

		<div class="separator"></div>

		{{-- Форма обратной связи --}}
		<x-recall
			{{-- ym-goal="recall-contacts" --}}
			class="modal_contacts__recall"
        >
			<h2>Закажите звонок</h2>
			<p>Напишите свой номер телефона — наш сотрудник позвонит вам в ближайшее рабочее время.</p>

			<x-forms.input
				label="Номер телефона"
				type="tel"
				name="f-phone"
				icon="mobile-alt-solid"
				placeholder="+7 123 456-78-90"
				required
			/>

			<x-button icon="mobile-alt-solid">
				Заказать звонок
			</x-button>
		</x-recall>
	</div>
</x-modal>
