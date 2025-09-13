<div class="dropdown add-post-block w-100-p" x-data="dropdown">
    <x-button
        class="dropdown__button add-post-block__button w-100-p"
        color="pale"
        icon="plus-solid"
        x-on:click="toggleDropdown"
    >Добавить новый блок</x-button>
    <div
        class="dropdown__menu add-post-block__options"
        x-show="opened"
        x-cloack
    >
        <div class="add-post-block__option" x-on:click="addBlock('text'); toggleDropdown();">Текст</div>
        <div class="add-post-block__option" x-on:click="addBlock('image'); toggleDropdown();">Фотография</div>
        <div class="add-post-block__option" x-on:click="addBlock('gallery'); toggleDropdown();">Фотогалерея</div>
        <div class="add-post-block__option" x-on:click="addBlock('video'); toggleDropdown();">Видео</div>
    </div>
</div>
