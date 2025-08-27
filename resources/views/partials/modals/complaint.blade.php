<x-modal name="complaint_modal">
    <div class="complaint">
        <div class="complaint__header">Отправка жалобы</div>
        <div class="complaint__content">

            <x-forms.select size="big" label="Тема жалобы" required>
                <option value="">Несанкционированное предпринимательство</option>
            </x-forms.select>

            <x-forms.textarea cols="10" label="Комментарий" placeholder="Расскажите, что именно сделал пользователь" />
        </div>
        <div class="complaint__button">
            <x-button is-block @click="openModal('complaint_modal_complete')" icon="check-solid">Отправить жалобу</x-button>
        </div>
    </div>
</x-modal>
