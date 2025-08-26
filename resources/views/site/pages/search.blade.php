@extends('site.layout.template-without-footer')

@section('page.title', 'Поиск')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="search-page">
        <h2 class="search-page__title">Поиск</h2>

        @livewire('search')
    </div>
@stop
