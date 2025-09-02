@props([
    'model' => null
])

<div class="paginator {{ $center ?? false ? 'paginator_center' : '' }}">

    @if(!$model->onFirstPage())
        <x-paginator.tab href="{{$model->previousPageUrl()}}" is-square icon="chevron-left-solid" />
    @endif

    @for($i = 1; $i <= $model->lastPage(); $i++)
        <x-paginator.tab
            href="{{$model->url($i)}}"
            is-square
            is-selected
            :is-selected="$model->currentPage() == $i"

        >{{$i}}</x-paginator.tab>
    @endfor


    @if(!$model->onLastPage())
        <x-paginator.tab href="{{$model->nextPageUrl()}}" is-square icon="chevron-right-solid" />
    @endif
    {{-- <a class="paginator__item" href="#">
        <x-icon icon="chevron-left-solid" />
    </a>
    <a class="paginator__item paginator__item_active" href="#">1</a>
    <a class="paginator__item" href="#">2</a>
    <a class="paginator__item" href="#">3</a>
    <a class="paginator__item" href="#">...</a>
    <a class="paginator__item" href="#">259</a>
    <a class="paginator__item" href="#">
        <x-icon icon="chevron-right-solid" />
    </a> --}}
</div>
