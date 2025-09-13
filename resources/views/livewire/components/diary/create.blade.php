<div class="diary-form">
    <div class="diary-form__header">
        <x-breadcrumbs :items="[
                [
                    'url' => route('pages.user.horses.my'),
                    'title' => 'Мои лошади'
                ],
                [
                    'url' => route('pages.horse.view', $horse->id),
                    'title' => $horse->name
                ],
                [
                    'url' => '/front/pages/diary/view',
                    'title' => 'Дневник'
                ]
        ]" />
        <h2>Новая запись</h2>
    </div>

    <div
        class="diary-form__content"
        x-data="createBlog"
    >
        <div class="diary-form__form">
            <div class="diary-form__input-group">
                <x-forms.input size="big" label="Заголовок" required />
                <x-forms.select size="big" label="Тема" required>
                    <option>Не выбрана</option>
                    @foreach($topics as $topic)
                        <option value="{{$topic->id}}">{{$topic->name}}</option>
                    @endforeach
                </x-forms.select>
            </div>
            <x-horse.diary.add-block />
        </div>

        <div class="diary-form__blocks">
            <x-forms.diary.blocks></x-forms.diary.blocks>
        </div>

        <div class="diary-form__flags">
            <x-forms.flag type="checkbox" label="Разрешить комментарии" wire:model.live="allowComments" />
            <x-forms.flag type="checkbox" label="Опубликовать пост"     wire:model.live="published" />
        </div>
        <div class="diary-form__footer">
            <x-link
                button
                size="big"
                icon="check-solid"
                x-on:click="submit"
            >Добавить запись</x-link>
        </div>
    </div>
</div>
