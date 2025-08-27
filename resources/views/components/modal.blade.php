@props([
    'name' => '',
    'disableWrapperClose' => false,
    'saveContent' => false,
    'sidebarContent' => false,
    'maxScreenWidth' => 0
])

<v-modal
    :name="'{{$name}}'"
    :disable-wrapper-close="@json($disableWrapperClose)"
    :max-screen-width="{{ $maxScreenWidth }}"
    :save-content="@json($saveContent)"
    :sidebar-content="@json($sidebarContent)"
    v-slot="{ close, modalData }"
    v-cloak
>
    {{ $slot }}
</v-modal>
