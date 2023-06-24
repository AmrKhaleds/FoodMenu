<div class="row flex-column align-items-center">
    <div class="categ-name">
        <h2>تابع طلباتك</h2>
        <img src="https://kalanidhithemes.com/live-preview/landing-page/delici/all-demo/Delici-Defoult/images/icons/separator.svg" alt="" title="" style="width: 100px">
    </div>
    <form wire:submit.prevent='search' style="width: 100%" class="col-md-6">
        <div class="col">
            <input type="text" name="order_tracking_number" class="reservation-fields inputs" placeholder="رقم الطلب" wire:model.defer='order_tracking_number'>
            @error('order_tracking_number')
                <span id="name_error" class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- @if($order_tracking_number) --}}
        {{-- @endif --}}
        <div class="col" style="text-align: center">
            <button id="submit" type="submit" style="margin: 0;">تتبع</button>
        </div>
    </form>
    <div class="loading" wire:loading>
        جارى البحث ...
    </div>
    @if($orderStatus)
        @if($error)
        {{-- {{$error}} --}}
        <div class="col-md-6 mt-1">
            <span class="text-center d-block" style="color: red;">
                {{ $orderStatus }}
            </span>
        </div>
        @else
        <div class="col-md-6 mt-3">
            <div class="text-center mb-1" id="example-caption-5">
                حالة الطلب :
                <span style="font-size: 23px;
                color: #bc8d4b;
                font-weight: bold;">
                    {{ $orderStatus }}
                </span>
            </div>
                <div class="progress" style="width:100%">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$statusPresentage}}" aria-valuemin="{{$statusPresentage}}" aria-valuemax="100" style="width:{{$statusPresentage}}%;background-color: {{ $statusColor }}">{{$statusPresentage}}%</div>
                </div>
            </div>
        @endif
    @endif
</div>