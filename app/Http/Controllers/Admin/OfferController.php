<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OfferRequest;
use App\Models\Offer;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::all();
        return view('dashboard.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id','name')->orderBy('created_at', 'desc')->get();
        $products = Product::with('category')->orderBy('created_at', 'desc')->get();
        return view('dashboard.offers.create', compact('products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferRequest $request)
    {
        $requestData = $request->all();
        try{
            $offer = Offer::create([
                'name' => $requestData['name'],
                'discount_type' => $requestData['discount_type'],
                'discount' => $requestData['discount'],
                'start_date' => $requestData['start_date'],
                'end_date' => $requestData['end_date'],
            ]);
            $productsRequest = $requestData['products'];
            // foreach($productsRequest as $product_id){
                $products = Product::whereIn('id', $productsRequest)->get();
            // }
            $offer->product()->saveMany($products);

            // dd($products);
            toast('تم انشاء العرض بنجاح', 'success');
            return redirect()->route('offers.create');
            // dd('suucess');
        }catch(Exception $e){
            dd($e);
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
        $offer = Offer::findOrFail($id);
        $categories = Category::select('id','name')->orderBy('created_at', 'desc')->get();
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('dashboard.offers.show', compact('offer', 'products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferRequest $request, string $id)
    {
        /*
            WHen Makeing Order::where('id', $id)->update($request);
            it return integer of effected rows 
            not instance of the model then i can't get any relation in offer model
        */
        $requestData = $request->all();
        try{
            $offer = Offer::find($id);
            $offer->update([
                'name' => $requestData['name'],
                'discount_type' => $requestData['discount_type'],
                'discount' => $requestData['discount'],
                'start_date' => $requestData['start_date'],
                'end_date' => $requestData['end_date'],
            ]);
            $productsRequest = $requestData['products'];
            $products = Product::whereIn('id', $productsRequest)->get();
            $offer->product()->saveMany($products);

            toast('تم تحديث العرض بنجاح', 'success');
            return redirect()->route('offers.index');
        }catch(Exception $e){
            dd($e);
        }
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
        try{
            $offer = Offer::find($id);
            $offer->product()->update(['offer_id' => null]); // Remove offer_id association from products
            $offer->delete(); 

            toast('تم حذف العرض بنجاح', 'success');
            return redirect()->route('offers.index');
        }catch(Exception $e){
            dd($e);
        }
    }

    public function updateStatus(Request $request)
    {
        $requestData = $request->all();
        $offer = Offer::findOrFail($requestData['offer_id']);

        if (!$offer) {
            return response()->json([
                'status' => false,
                'msg' => 'Product not found',
            ]);
        }
        // update status on change
        $offer->status = $requestData['status'];
        $offer->save();
    
        $message = $requestData['status'] == 1 ? 'تم تفعيل العرض بنجاح' : 'تم إلغاء تفعيل العرض بنجاح';

        return response()->json([
            'status' => true,
            'msg' => $message,
        ]);
    }
}
