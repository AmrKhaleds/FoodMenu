<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ClearSession extends Component
{
    public $cartItems;

    public function clear()
    {
        // Clear all session data
        Session::flush();
        // Emit a custom event
        $this->emit('sessionCleared');
    }
    public function render()
    {
        return view('livewire.clear-session');
    }
}
