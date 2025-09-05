<div>
    @if($step == 1)
        <div class="horse-form">
            <div>
                <x-breadcrumbs :items="[
                    [
                        'url' => route('pages.user.horses.my'),
                        'title' => 'Мои лошади'
                    ]
                ]" />
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
            {{--        <x-alert type="warning" url="/front/pages/horses/guest">Лошадь с таким чипом уже есть в базе «Наши кони». Если это ваша лошадь, используйте кнопку «Это моя лошадь» <b>на странице лошади Изольда</b>, чтобы стать ее владельцем.</x-alert>--}}
            <x-link class="w-100-p" wire:click="nextStep" button size="big" icon="chevron-right-solid">Следующий шаг</x-link>
        </div>
    @elseif($step == 2)

        <div class="horse-form horse-form_two">
            <div class="horse-form__breadcrumbs">
                <x-breadcrumbs :items="[
                    [
                        'url' => route('pages.user.horses.my'),
                        'title' => 'Мои лошади'
                    ]
                ]" />
                <h2 class="horse-big-card__title">Новая лошадь</h2>
            </div>
            <div class="horse-form__back-button">
                <x-link wire:click="previousStep" icon="long-arrow-left">Вернуться к предыдущему шагу</x-link>
            </div>
            <div class="horse-form__sections">
                <div class="horse-form__documents-section">
                    <x-forms.input size="big" disabled type="number" label="Номер чипа" required placeholder="XXXXXXXXXXXXXXX" />
                    <x-forms.input size="big" label="Дата покупки" required type="date" />
                    <div class="horse-form__input_1">
                        <x-forms.file label="Документы, подтверждающие номер чипа и владение лошадью" required hint="В формате PDF, JPEG или PNG. До 10 файлов. Максимальный размер каждого файла — 8 MB." />
                    </div>
                </div>
                <div class="horse-form__horse-information">
                    <div class="horse-form__input_2">
{{--                        @include('site.blocks.horses.prev-horse-fields')--}}
                    </div>
                    <x-forms.input size="big" required label="Кличка" />
                    <x-forms.input size="big" type="number" label="Рост в холке, см" />
                    <div class="horse-form__input_3">
                        <label>Пол</label>
                        <div class="horse-form__input_3-checkboxes">
                            <x-forms.flag type="radio" label="Жеребец" name="sex" checked />
                            <x-forms.flag type="radio" label="Кобыла" name="sex" />
                            <x-forms.flag type="radio" label="Мерин" name="sex" />
                        </div>
                    </div>
                    <x-forms.select size="big" label="Порода" required>
                        <option value="">Не выбрана</option>
                        @foreach(\App\Models\HorseBreed::all() as $breed)
                            <option value="{{$breed->id}}">{{$breed->name}}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.select size="big" label="Масть" required>
                        <option value="">Не выбрана</option>
                        @foreach(\App\Models\HorseColor::all() as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.select size="big" label="Специализация">
                        <option value="">Не выбрана</option>
                        @foreach(\App\Models\HorseSpecialization::all() as $specialization)
                            <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.input size="big" type="date" label="Дата рождения" required />
                    <x-forms.input size="big" label="Отец" required icon="search-solid" icon-right />
                    <x-forms.input size="big" label="Мать" required icon="search-solid" icon-right />
{{--                    @include('site.blocks.horses.horse-placement-field')--}}
                    <x-forms.input size="big" label="Место рождения" />
                    <x-forms.textarea class="horse-form__input_5" label="Расскажите о лошади" rows="5" required hint="Не менее 140 символов" />
                </div>
                <div class="horse-form__photos-section">
                    <x-forms.file label="Фотографии" required hint="В формате JPEG или PNG. До 20 файлов. Максимальный размер каждого файла — 8 MB. После загрузки изображение будет обрезано в пропорции 16:9." />
                </div>
                <div class="horse-form__buttons-section">
                    <p class="horse-form__hint">Перед добавлением лошади в список ваших лошадей, данные должны пройти модерацию. Модерация может занять несколько дней.</p>
                    <form class="horse-form__step-two-buttons" action="/front/pages/horses/list">
                        <x-button class="w-100-p" size="big" icon="check-solid">Отправить на модерацию</x-button>
                        <x-button class="w-100-p" color="pale" size="big">Сохранить черновик</x-button>
                        <x-button class="w-100-p" link>Удалить лошадь</x-button>
                    </form>
                </div>
            </div>
        </div>

    @endif


</div>
