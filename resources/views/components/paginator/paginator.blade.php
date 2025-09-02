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
</div>
