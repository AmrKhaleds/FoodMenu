<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\Table;
use Livewire\Component;

class RestaurantPlacesForm extends Component
{
    public $rooms= [];
    public $tables= [];

    public $selectedRoom;
    public $selectedTable;

    public function mount()
    {
        $this->rooms = Room::all();
    }

    public function render()
    {
        return view('livewire.restaurant-places-form');
    }

    public function changeRoom()
    {
        sleep(1);
        if ($this->selectedRoom !== '-1') {
            $this->tables = Table::where('room_id', $this->selectedRoom)->get();
        }
    }
}
