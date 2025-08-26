@extends('site.layout.template-without-footer')

@section('page.title', 'Форма обращения в поддержку')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="support-page">
        <h2 class="support-page__title">Написать в поддержку</h2>

        @livewire('support')
    </div>
@stop
