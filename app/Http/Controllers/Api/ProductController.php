<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponse;
    public function getProducts()
    {
        try {
            $products = Product::active()->with('category')->get();
            return $this->successResponse($products, 'Success Get Products', 200);
        } catch (\Exception $e) {
            // Log the exception or handle it according to your application's requirements
            return $this->errorResponse('Failed to retrieve products: ' . $e->getMessage(), 500);
        }
    }

    public function getProduct(Request $request)
    {
        try {
            $id = $request->id;
            $product = Product::findOrFail($id);
            return $this->successResponse($product, 'Success Get Product', 200);
        } catch (\Exception $e) {
            // Log the exception or handle it according to your application's requirements
            return $this->errorResponse('Failed to retrieve product: ' . $e->getMessage(), 500);
        }
    }

    public function getProductsByCategory(Request $request)
    {
        try {
            $id = $request->id;
            $products = Product::where('category_id', $id)->get();
            return $this->successResponse($products, 'Success Get Products', 200);
        } catch (\Exception $e) {
            // Log the exception or handle it according to your application's requirements
            return $this->errorResponse('Failed to retrieve products: ' . $e->getMessage(), 500);
        }
    }
}
