@extends('layouts.front')
@section('title', 'Order Tracking')
@section('content')
    @livewire('order-tracking-component', ['trackingNumber' => $trackingNumber])
@endsection
