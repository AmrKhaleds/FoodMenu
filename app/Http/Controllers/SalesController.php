<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Exception;
use Illuminate\Http\Request;

class SalesController extends Controller
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
        $categories = Category::select('id','name')->orderBy('created_at', 'desc')->get();
        return view('dashboard.sales.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $requestData = $request->all();
        try{
            $productsRequest = $requestData['products'];
            foreach($productsRequest as $product_id){
                Sale::create([
                    'name' => $requestData['name'],
                    'product_id' => $product_id,
                    'discount_type' => $requestData['discount_type'],
                    'discount' => $requestData['discount'],
                    'start_date' => $requestData['start_date'],
                    'end_date' => $requestData['end_date'],
                ]);
            }
            
            toastr()->success('تم انشاء العرض بنجاح');
            return redirect()->route('sales.index');
            // dd('suucess');
        }catch(Exception $e){

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    public function getProducts(Request $request)
    {
        // dd($request->all());
        $requestData = $request->all();
        try{
            $category_id = $requestData['categoryId'];
            if($category_id == 'all'){
                $products = Product::all();
            }else{
                $products = Product::where('category_id', $category_id)->get();
            }

            return response()->json([
                'success' => true,
                'data' => $products
            ]);

        }catch(Exception $e){

        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
