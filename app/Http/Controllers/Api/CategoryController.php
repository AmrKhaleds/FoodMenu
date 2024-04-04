<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponse;
    public function getCategories()
    {
        try {
            $categories = Category::active()->get();
            return $this->successResponse($categories, 'Success Get Categories', 200);
        } catch (\Exception $e) {
            // Log the exception or handle it according to your application's requirements
            return $this->errorResponse('Failed to retrieve Category: ' . $e->getMessage(), 500);
        }
    }

    public function getCategory(Request $request)
    {
        try {
            $category = Category::findOrFail($request->id);
            return $this->successResponse($category, 'Success Get Category', 200);
        } catch (\Exception $e) {
            // Log the exception or handle it according to your application's requirements
            return $this->errorResponse('Failed to retrieve Category: ' . $e->getMessage(), 500);
        }
    }
}
