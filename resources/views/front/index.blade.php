@extends('layouts.front')
@section('title', $settings['site_name'])
@section('custom_css')
    <style>
        .order-tracking {
            position: absolute;
            top: 17px;
            right: 17px;
        }

        .order-tracking span {
            font-size: 25px;
            background: #171819;
            width: 46px;
            height: 46px;
            display: block;
            border-radius: 50%;
            border: 2px solid #fdd7a2;
            /* padding: 6px; */
            text-align: center;
        }

        .tippy-box[data-theme~='tomato'] {
            background-color: rgb(228, 197, 144);
            color: rgb(23 24 25);
        }

        .tippy-box[data-theme~='tomato'][data-placement^='left']>.tippy-arrow::before {
            border-left-color: #fe2323ad;
        }
    </style>
@endsection
@section('content')
    <div class="order-tracking">
        <a href="{{ route('order-track.index') }}">
            <span id="order-track">
                <i class="las la-truck"></i>
            </span>
        </a>
    </div>
    @livewire('clear-session')
    @livewire('items-component')
@endsection
@section('custom_js')
    <script>
        tippy('#order-track', {
            content: 'تابع طلبك من هنا', // Replace with your tooltip content
            showOnCreate: true,
            placement: 'left',
            theme: 'tomato',
        });
    </script>
@endsection
