<div class="row w-100">
    <div class="col-md-6">
        <select name="order_user_city" id=""
            style="    width: 100%;
        color: rgb(255, 255, 255);
        background: transparent;
        border: 2px solid white;
        height: 40px;direction: rtl;
        margin-bottom: 16px;" wire:model="selectedCity" wire:change="changeCity">
            <option selected>البلد المتاحة لخدمة التوصيل</option>
            @foreach($cities as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select>
        @error('order_user_city')
            <span id="name_error" class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <p wire:loading style="float: right;color: red;">جارى التحميل...</p>
        {{-- {{ $selectedPlace }} --}}
        <select name="order_user_place" id=""
            style="width: 100%;
        color: rgb(255, 255, 255);
        background: transparent;
        border: 2px solid white;
        height: 40px;direction: rtl;
        margin-bottom: 16px;">
            <option selected disabled>المنطقة المتاحة لخدمة التوصيل</option>
            @foreach($places as $place)
                <option value="{{$place->id}}">{{$place->name}}</option>
            @endforeach
        </select>
        @error('order_user_place')
            <span id="name_error" class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>