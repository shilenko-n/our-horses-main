
@extends('layouts.template')

@section('page.content')

    <div class="diary diary_single">
        <div class="diary__container">
            <livewire:components.diary.create :$horse />
        </div>
    </div>

@endsection
