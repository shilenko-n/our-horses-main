<div>
    <form wire:submit.prevent="submit" class="support-page__form">
        <x-forms.input type="text" size="big" label="Имя" placeholder="Иван" wire:model="name" required />
        <x-forms.input size="big" type="email" label="Электронный адрес" placeholder="example@mail.ru" wire:model="email" required />
        <x-forms.select size="big" label="Тема" wire:model="subject">
            <option value="">Восстановление доступа</option>
        </x-forms.select>
        <x-forms.textarea rows="10" label="Сообщение" placeholder="Опишите подробнее вашу ситуацию" wire:model="message"></x-forms.textarea>
        <x-forms.file label="Вложение" hint="До 20 файлов. Максимальный размер каждого файла — 8 MB." wire:model="file" />
        <x-button class="w-100-p" icon="check-solid" size="big" type="submit">Отправить</x-button>
    </form>
</div>
