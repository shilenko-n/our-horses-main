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
                wire:model.live="user.email"
                required
            />
            <div class="personal-settings__form-columns">
                <x-forms.password
                    size="big"
                    label="Пароль"
                    hint="Не менее 6 символов: буквы, цифры и специальные символы"
                    wire:model.live="password"
                    required
                />
                <x-forms.password
                    size="big"
                    label="Повторите пароль"
                    wire:model.live="password_confirmation"
                    required
                />
            </div>
            <x-button class="w-100-p" size="big" icon="check-solid" wire:click="changeEmail">Сохранить</x-button>

            @if($emailChanged)
                <div class="alert-success">
                    Почта была успешно сохранена
                </div>
            @endif

            @if($error !== '')
                <div class="alert-danger">
                    {{$error}}
                </div>
            @endif

        </div>
    </div>
    <div class="personal-settings__block">
        <h3 class="personal-settings__sub-title">Персональные данные</h3>
        <form
            class="personal-settings__form"
            wire:submit.prevent="submit"
        >
            <div class="personal-settings__photo">
                @if(Auth::user()->getAvatar() == null)
                    <img
                        class="personal-settings__image"
                        src="https://placehold.co/240x240"
                        alt="user avatar"
                    />
                @else
                    <img
                        class="personal-settings__image"
                        src="{{Auth::user()->getAvatar()}}"
                        alt="user avatar"
                    />
                @endif

                {{--                        <x-forms.file hint="В формате JPEG или PNG. Максимальный размер — 8 MB." />--}}
            </div>
            <div class="personal-settings__form-columns">
                <x-forms.input
                    type="text"
                    size="big"
                    label="Имя"
                    placeholder="Иван"
                    wire:model.live="user.name"
                    required
                />
                <x-forms.input
                    type="text"
                    size="big"
                    label="Фамилия"
                    placeholder="Иванов"
                    wire:model.live="user.surname"
                    required
                />
            </div>
            <div class="personal-settings__form-columns">
                <x-forms.input
                    size="big"
                    type="date"
                    label="Дата рождения"
                    wire:model.live="user.birthday"
                    required
                />
                <div class="personal-settings__form-radio">
                    <label>Пол</label>
                    <div>
                        <x-forms.flag
                            type="radio"
                            name="sex"
                            value="male"
                            wire:model.live="user.gender"
                            :checked="$user['gender'] == 'male'"
                            label="Мужской"
                        />
                        <x-forms.flag
                            type="radio"
                            name="sex"
                            value="female"
                            wire:model.live="user.gender"
                            :checked="$user['gender'] == 'female'"
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
                    wire:model.live="user.phone"
                    required
                />

            </div>
            <x-forms.textarea
                rows="10"
                label="Обо мне"
                model="user.description"
            >{{$user['description']}}</x-forms.textarea>
            <x-button
                type="submit"
                class="w-100-p"
                icon="check-solid"
                size="big"
            >Сохранить</x-button>

            @if($userChanged)
                <div class="alert-success">
                    Пользователь был сохранён
                </div>
            @endif
        </form>
    </div>
</div>
