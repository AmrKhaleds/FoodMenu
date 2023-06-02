<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function __invoke(){
        $categories = Category::with('product')->where('status', true)->get();
        return view('front.index', compact('categories'));
    }
    
}
