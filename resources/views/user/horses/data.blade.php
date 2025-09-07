
@extends('layouts.template')

@section('page.content')

    <livewire:user.horses.add
        :horseModel="$horse ?? null"
    />

@endsection
