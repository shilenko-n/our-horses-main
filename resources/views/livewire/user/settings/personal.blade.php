<div>
    <div class="personal-settings__block">
        <h3 class="personal-settings__sub-title">Системные данные</h3>
        <div class="personal-settings__form">
            <x-forms.input
                size="big"
                type="email"
                label="Электронный адрес"
                hint="Используется для входа, восстановления пароля и получения уведомлений от сервиса. Никакого спама!"
                placeholder="example@mail.ru"
                :value="Auth::user()->email"
                required
            />
            <div class="personal-settings__form-columns">
                <x-forms.password size="big" label="Пароль" hint="Не менее 6 символов: буквы, цифры и специальные символы" required />
                <x-forms.password size="big" label="Повторите пароль" required />
            </div>
            <x-button class="w-100-p" size="big" icon="check-solid">Сохранить</x-button>
        </div>
    </div>
    <div class="personal-settings__block">
        <h3 class="personal-settings__sub-title">Персональные данные</h3>
        <div class="personal-settings__form">
            <div class="personal-settings__photo">
                <img class="personal-settings__image" src="https://placehold.co/240x240">
                {{--                        <x-forms.file hint="В формате JPEG или PNG. Максимальный размер — 8 MB." />--}}
            </div>
            <div class="personal-settings__form-columns">
                <x-forms.input
                    type="text"
                    size="big"
                    label="Имя"
                    placeholder="Иван"
                    :value="Auth::user()->name"
                    required
                />
                <x-forms.input
                    type="text"
                    size="big"
                    label="Фамилия"
                    placeholder="Иванов"
                    :value="Auth::user()->surname"
                    required
                />
            </div>
            <div class="personal-settings__form-columns">
                <x-forms.input
                    size="big"
                    type="date"
                    label="Дата рождения"
                    :value="Auth::user()->birthday"
                    required
                />
                <div class="personal-settings__form-radio">
                    <label>Пол</label>
                    <div>
                        <x-forms.flag
                            type="radio"
                            name="sex"
                            :checked="Auth::user()->gender == 'male'"
                            label="Мужской"
                        />
                        <x-forms.flag
                            type="radio"
                            name="sex"
                            :checked="Auth::user()->gender == 'female'"
                            label="Женский"
                        />
                    </div>
                </div>
            </div>
            <div class="personal-settings__form-columns">
                <x-forms.select
                    size="big"
                    label="Страна"
                    required
                    wire:model.live="selectedCountryId"
                >
                    @foreach($locations as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </x-forms.select>
                <x-forms.select
                    size="big"
                    label="Населённый пункт"
                    required
                    wire:model.live="selectedCityId"
                >
                    @foreach($locations->find($selectedCountryId)->cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </x-forms.select>
            </div>
            <div class="personal-settings__form-columns">
                <x-forms.input
                    size="big"
                    type="text"
                    label="Телефон"
                    placeholder="+7 (999) 999-99-99"
                    value="{{Auth::user()->phone}}"
                    required
                />

            </div>
            <x-forms.textarea rows="10" label="Обо мне">{{Auth::user()->description}}</x-forms.textarea>
            <x-button class="w-100-p" icon="check-solid" size="big">Сохранить</x-button>
        </div>
    </div>
</div>
