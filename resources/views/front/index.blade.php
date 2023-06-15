@extends('layouts.front')
@section('title', $settings['site_name'])
@section('content')
    @livewire('clear-session')
    @livewire('items-component')
@endsection
