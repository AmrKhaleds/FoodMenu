<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function __invoke(){
        $guestIdentifier = Session::get('guestIdentifier');
        $getContent = \Cart::session($guestIdentifier)->getContent();
        $subTotal = \Cart::session($guestIdentifier)->getTotal();
        $categories = Category::with('product')->where('status', true)->get();
        
        return view('front.index', compact('categories', 'subTotal', 'getContent'));
    }
}
