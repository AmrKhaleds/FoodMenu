<div class="row w-100">
    <div class="col-md-6">
        <select name="room_number" id=""
            style="    width: 100%;
        color: rgb(255, 255, 255);
        background: transparent;
        border: 2px solid white;
        height: 40px;direction: rtl;
        margin-bottom: 16px;"  wire:model="selectedRoom" wire:change="changeRoom">
            <option>صالة رقم</option>
            @foreach($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->name }}</option>
            @endforeach
        </select>
        @error('room_number')
            <span id="name_error" class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <p wire:loading style="float: right;color: red;">جارى التحميل...</p>
        <select name="table_number" id=""
            style="    width: 100%;
        color: rgb(255, 255, 255);
        background: transparent;
        border: 2px solid white;
        height: 40px;direction: rtl;
        margin-bottom: 16px;" >
            <option selected disabled>طاولة رقم</option>
            @foreach($tables as $table)
                <option value="{{ $table->id }}">{{ $table->name }}</option>
            @endforeach
        </select>
        @error('table_number')
            <span id="name_error" class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>