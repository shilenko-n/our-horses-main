<form wire:submit.prevent="submit" class="sale-rent__form">
	<div class="sale-rent__form__section">
		<x-forms.input type="text" size="big" label="Стоимость" value="1 500 000" hint="Для объявления об аренде необходимо указывать стоимость в месяц" wire:model="price" required />
		<div class="sale-rent__form__currency-type">
			<x-forms.flag id="checkbox1" label="₽" type="checkbox" checked />
			<x-forms.flag id="checkbox2" label="Гривна ₴" type="checkbox" />
			<x-forms.flag id="checkbox3" label="Беларусский рубль Br" type="checkbox" />
			<x-forms.flag id="checkbox4" label="$" type="checkbox" />
			<x-forms.flag id="checkbox5" label="€" type="checkbox" />
		</div>
		<x-forms.textarea  label="Комментарий" row="8" size="big" value="Доброжелательная, спокойная кобыла. Никогда не укусит и не ударит, безопасна, любит детей. Обследована, здоровая, без вредных привычек, психика отличная. Кобыла-учитель, идеально подойдёт для начинающих, в конкуре прыгает из любых положений, прощает ошибки, сама очень любит прыгать." />
	</div>
	<div class="sale-rent__form__section sale-rent__form__section_border">
		<h3>Контакты продавца</h3>
		<p class="p hint-color">Будут видны всем.</p>

		<div class="sale-rent__form__section__grid">
			<div>
				<x-forms.input size="big" name="phone" label="Контактный номер телефона" icon="mobile-alt-solid" value="+7 900 320-10-21" />
				<div class="sale-rent__form__section__grid__grid">
					<x-forms.flag id="checkbox6" name="socialNetworkForCommunication" label="Whatsapp" type="checkbox" checked />
					<x-forms.flag id="checkbox6" name="socialNetworkForCommunication" label="Viber" type="checkbox" />
				</div>
			</div>
			<x-forms.input size="big" name="email" label="Электронный адрес" icon="envelope-solid" placeholder="example@mail.ru" />
			<x-forms.input size="big" name="linkVk" label="Вконтакте" value="vk.com/id123456" icon="vk" />
			<x-forms.input size="big" name="linkTelegram" label="Telegram" value="t.me/username" icon="telegram" />
		</div>
	</div>
	<div class="sale-rent__form__section sale-rent__form__section_border">
		<h3>Статус объявления</h3>
		<div class="sale-rent__form__section__list">
			<x-forms.flag type="radio" name="status" label="Не показывать" checked />
			<x-forms.flag type="radio" name="status" label="Показывать объявление о продаже" />
			<x-forms.flag type="radio" name="status" label="Показывать объявление об аренде" />
		</div>
		<x-button class="w-100-p" icon="check-solid" size="big" type="submit">Сохранить сведения</x-button>
	</div>
</form>
