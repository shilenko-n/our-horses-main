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
                    <x-forms.input
                        size="big"
                        type="number"
                        label="Номер чипа"
                        required
                        placeholder="XXXXXXXXXXXXXXX"
                        wire:model.live.debounce.250ms="chipNumber"
                    />
                </div>
                <div class="w-100">
                    <x-forms.input
                        size="big"
                        label="Дата покупки"
                        required
                        type="date"
                        wire:model.live.debounce.250ms="purchaseDate"
                    />
                </div>
            </div>
            @if($error)
                <x-forms.alert
                    type="warning"
                    url="/front/pages/horses/guest"
                >
                    {{$error}}
                </x-forms.alert>
            @endif
            <x-link
                class="w-100-p"
                wire:click="nextStep"
                button
                size="big"
                icon="chevron-right-solid"
            >Следующий шаг</x-link>
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
            <div class="horse-form__sections" x-data="horsePlacement">
                <div class="horse-form__documents-section">
                    <x-forms.input
                        size="big"
                        disabled
                        type="number"
                        label="Номер чипа"
                        required
                        placeholder="XXXXXXXXXXXXXXX"
                        wire:model="chipNumber"
                    />
                    <x-forms.input
                        size="big"
                        label="Дата покупки"
                        required
                        type="date"
                        wire:model="purchaseDate"
                    />
                    <div class="horse-form__input_1">
                        <x-forms.file
                            label="Документы, подтверждающие номер чипа и владение лошадью"
                            required
                            hint="В формате PDF, JPEG или PNG. До 10 файлов. Максимальный размер каждого файла — 8 MB."
                            model="file"
                        />

                        <div class="horse-form__input_1-files">

                            @foreach($files as $file)
                                <x-forms.file-uploaded
                                    :name="$file->getClientOriginalName()"
                                    :type="strtoupper($file->extension())"
                                    :size="$file->getSize()"
                                />
                            @endforeach

                        </div>
                    </div>

                    @error('file')
                        <x-forms.alert>
                            {{$message}}
                        </x-forms.alert>
                    @enderror

                    @error('fileCount')
                        <x-forms.alert>
                            {{$message}}
                        </x-forms.alert>
                    @enderror
                </div>
                <div class="horse-form__horse-information">
                    <div
                        class="horse-form__input_2"
                        x-data="previousHorse"
                    >
                        <x-forms.flag
                            :disabled="$disabled ?? false"
                            label="Прежняя лошадь"
                            x-on:click="changeShow"
                        />
                        <x-forms.select
                            size="big"
                            :disabled="$disabled ?? false"
                            x-show="show"
                            x-model="type"
                            label="Причина"
                            hint="Проданная лошадь станет недоступна для редактирования и добавления записей в дневник"
                            required
                        >
                            <option value="sale">Лошадь продана</option>
                            <option value="dead">Лошадь пала</option>
                        </x-forms.select>
                        <x-forms.input
                            size="big"
                            :disabled="$disabled ?? false"
                            x-show="show && type == 'sale'"
                            type="date"
                            required
                            label="Дата продажи"
                            wire:model.live.debounce.250ms="horse.purchaseDate"
                        />
                        <x-forms.input
                            size="big"
                            :disabled="$disabled ?? false"
                            x-show="show && type == 'dead'"
                            type="date"
                            required
                            label="Дата смерти"
                            wire:model.live.debounce.250ms="horse.deathDay"
                        />

                    </div>
                    <x-forms.input
                        size="big"
                        required
                        label="Кличка"
                        wire:model.live.debounce.250ms="horse.name"
                    />
                    <x-forms.input
                        size="big"
                        type="number"
                        label="Рост в холке, см"
                        wire:model.live.debounce.250ms="horse.size"
                    />
                    <div class="horse-form__input_3">
                        <label>Пол</label>
                        <div class="horse-form__input_3-checkboxes">
                            <x-forms.flag type="radio" label="Жеребец" name="sex" checked wire:model.live="horse.gender" />
                            <x-forms.flag type="radio" label="Кобыла" name="sex" wire:model.live="horse.gender" />
                            <x-forms.flag type="radio" label="Мерин" name="sex" wire:model.live="horse.gender" />
                        </div>
                    </div>
                    <x-forms.select size="big" label="Порода" required wire:model.live="horse.breed">
                        <option value="">Не выбрана</option>
                        @foreach(\App\Models\HorseBreed::all() as $breed)
                            <option value="{{$breed->id}}">{{$breed->name}}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.select size="big" label="Масть" required wire:model.live="horse.color">
                        <option value="">Не выбрана</option>
                        @foreach(\App\Models\HorseColor::all() as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.select size="big" label="Специализация" wire:model.live="horse.specialization">
                        <option value="">Не выбрана</option>
                        @foreach(\App\Models\HorseSpecialization::all() as $specialization)
                            <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.input
                        size="big"
                        type="date"
                        label="Дата рождения"
                        required
                        wire:model.live="horse.birthday"
                    />
                    <x-forms.input
                        size="big"
                        label="Отец"
                        required
                        icon="search-solid"
                        icon-right
                        wire:model.live="horse.father"
                    />
                    <x-forms.input
                        size="big"
                        label="Мать"
                        required
                        icon="search-solid"
                        icon-right
                        wire:model.live="horse.mother"
                    />

                    <x-forms.select
                        size="big"
                        label="Страна"
                        required
                        x-bind:disabled="placementChangeDisabled"
                        wire:model.live="horse.country"
                    >
                        <option value="">Не выбрана</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </x-forms.select>
                    <div class="horse-form__input_4">
                        <x-forms.select
                            size="big"
                            label="Населённый пункт"
                            required
                            x-bind:disabled="placementChangeDisabled"
                            wire:model.live="horse.city"
                        >
                            <option value="">Не выбрана</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </x-forms.select>
                        <x-forms.flag
                            @click="placementChangeToggle"
                            :checked="$checked ?? false"
                            label="Совпадает с населённым пунктом владельца"
                        />
                    </div>


                    <x-forms.input
                        size="big"
                        label="Место рождения"
                        wire:model.live="horse.birthPlace"
                    />
                    <x-forms.textarea
                        class="horse-form__input_5"
                        label="Расскажите о лошади"
                        rows="5"
                        required
                        hint="Не менее 140 символов"
                        wire:model.live.debounce.500ms="horse.about"
                    />
                </div>
                <div class="horse-form__photos-section">
                    <x-forms.file
                        label="Фотографии"
                        required
                        hint="В формате JPEG или PNG. До 20 файлов. Максимальный размер каждого файла — 8 MB. После загрузки изображение будет обрезано в пропорции 16:9."
                    />
                </div>
                <div class="horse-form__buttons-section">
                    <p class="horse-form__hint">Перед добавлением лошади в список ваших лошадей, данные должны пройти модерацию. Модерация может занять несколько дней.</p>
                    <x-button
                        class="w-100-p"
                        size="big"
                        icon="check-solid"
                        wire:click="test"
                    >Отправить на модерацию</x-button>
                    <form class="horse-form__step-two-buttons" >

                        <x-button class="w-100-p" color="pale" size="big">Сохранить черновик</x-button>
                        <x-button class="w-100-p" link>Удалить лошадь</x-button>
                    </form>
                </div>
            </div>
        </div>

    @endif


</div>
