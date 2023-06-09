<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $value = Session::get('guestIdentifier');
        $getProduct = Product::find($requestData['id']);
        $cart = \Cart::session($value);

        $price = $getProduct['price'];
        // array format
        if($getProduct->offer){
            $discount = $getProduct->offer->discount;
            if($getProduct->offer->discount_type == 'price'){
                $price = $price - $discount;
            }else{
                $price = $price- ($price * $discount / 100);
            }
        }

        $cartItems = [
            'id' => $getProduct['id'], // inique row ID
            'name' => $getProduct['name'],
            'price' => $price,
            'quantity' => 1,
            'attributes' => array()
        ];
        $cart->add($cartItems);
        $subTotal = \Cart::session($value)->getTotal();

        return response()->json([
            'status' => true,
            'msg' => 'تم اضافة المنتج بنجاح',
            'subTotal' => $subTotal
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $value = Session::get('guestIdentifier');
        $cart = \Cart::session($value);
        $cart->remove($id);
        $subTotal = \Cart::session($value)->getTotal();

        return response()->json([
            'status' => true,
            'msg' => 'تم حذف المنتج بنجاح',
            'subTotal' => $subTotal
        ]);
        // dd($id);
    }
}
