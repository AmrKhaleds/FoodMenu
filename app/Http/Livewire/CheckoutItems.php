<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CheckoutItems extends Component
{
    public $items;
    private $userSession;

    public function mount()
    {
        $this->userSession = Session::get('guestIdentifier');
        $this->items = \Cart::session($this->userSession)->getContent();
    }

    public function remove($id)
    {
        $userSession = Session::get('guestIdentifier');
        \Cart::session($userSession)->remove($id);
        unset($this->items[$id]);
    }

    public function render()
    {
        $items = $this->items;
        $total = \Cart::session(Session::get('guestIdentifier'))->getTotal();
        return view('livewire.checkout-items', compact('items', 'total'));
    }
}
