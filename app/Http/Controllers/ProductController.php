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
        if ($request->hasFile('photo')) {
            $photoName = time();
            $image = $request['photo'];
            $photoWithOriginalExtention = $photoName . '.' . $request['photo']->getClientOriginalExtension();
            $storage_path = 'public/products/';
            $image->storeAs($storage_path, $photoWithOriginalExtention);
            // dd("photo_upload successfullly");
        }
        // dd($requestData);
        $product = Product::create([
            'name' => $requestData['name'],
            'desc' => $requestData['desc'],
            'photo' => $photoWithOriginalExtention,
            'price' => $requestData['price'],
            'category_id' => $requestData['category_id'],
        ]);
        if ($product) {
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
        $product = Product::where('id', $id)->first();
        $requestData = $request->except(['_method', '_token']);
        if ($request->hasFile('photo')) {
            $photoName = time();
            $image = $request['photo'];
            $photoWithOriginalExtention = $photoName . '.' . $request['photo']->getClientOriginalExtension();
            $storage_path = 'public/products/';
            $image->storeAs($storage_path, $photoWithOriginalExtention);
            // dd("photo_upload successfullly");
        }else{
            $photoWithOriginalExtention = $product->photo;
            // dd($photoWithOriginalExtention);
        }
        $update = $product->update([
            'name' => $requestData['name'],
            'desc' => $requestData['desc'],
            'photo' => $photoWithOriginalExtention,
            'price' => $requestData['price'],
            'category_id' => $requestData['category_id'],
        ]);
        if ($update) {
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
        if ($product->delete()) {
            return redirect()->route('products.index')->with(['success' => 'تم حذف المنتج بنجاح']);
        }
        return redirect()->route('products.index')->with(['error' => 'حدثت مشكلة اثناء حذف المنتج']);
    }
}
