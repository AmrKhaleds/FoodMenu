<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Place;
use Livewire\Component;

class DeliveryPlacesForm extends Component
{
    public $cities= [];
    public $places= [];

    public $selectedCity;
    public $selectedPlace;

    public function mount()
    {
        $this->cities = City::all();
    }

    public function render()
    {
        return view('livewire.delivery-places-form');
    }

    public function changeCity()
    {
        sleep(1);
        if ($this->selectedCity !== '-1') {
            $this->places = Place::where('city_id', $this->selectedCity)->get();
        }
    }
}
