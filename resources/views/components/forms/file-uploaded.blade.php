@props([
    'name' => '',
    'type' => '',
    'size' => ''
])

<div class="file-uploaded">
    <div class="file-uploaded__icon">
        <x-icon icon="file-pdf-solid" />
    </div>
    <div class="file-uploaded__info">
        <div class="file-uploaded__info-name">{{$name}}</div>
        <div class="file-uploaded__info-meta">{{$type}}, {{$size}} KB</div>
    </div>
</div>
