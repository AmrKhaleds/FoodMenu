<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        // dd($requestData);
        $product = Product::create($requestData);
        if($product){
            return redirect()->route('products.create')->with(['success' => 'تم إنشاء المنتج بنجاح']);
        }
        return redirect()->route('products.index')->with(['error', 'حدث خطأ اثناء العملية']);

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->except(['_method', '_token']);
        $update = Product::where('id', $id)->update($requestData);
        if($update){
            return redirect()->route('products.index')->with(['success' => 'تم تحديث المنتج بنجاح']);
        }
        return redirect()->route('products.index')->with(['error' => 'حدثت مشكلة اثناء تحديث المنتج']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->delete()){
            return redirect()->route('products.index')->with(['success' => 'تم حذف المنتج بنجاح']);
        }
        return redirect()->route('products.index')->with(['error' => 'حدثت مشكلة اثناء حذف المنتج']);
    }
}
