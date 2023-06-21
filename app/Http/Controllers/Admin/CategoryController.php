<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('product')->orderBy('created_at', 'desc')->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // dd($request->all());
        Category::create($request->all());
        toast('تم انشاء الفئة بنجاح','success');
        return redirect()->route('categories.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::where('id', $id)->update([
            'name' => $request->name,
            'status' => $request->status ?? false
        ]);
        
        if($category){
            toast('تم تعديل الفئة بنجاح','success');
            return redirect()->route('categories.index');
        }
        toast('حدثت مشكلة اثناء تحديث الفئة', 'error');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->delete()){
            // toastr()->success('تم حذف الفئة بنجاح');
            toast('تم حذف الفئة بنجاح','success');
            return redirect()->route('categories.index');
        }
        toast('حدثت مشكلة اثناء حذف الفئة', 'error');
        return redirect()->route('categories.index');
    }

    public function updateCategoryStatus(Request $request){
        $requestData = $request->validate([
            'category_id' => 'required',
            'status' => 'required|in:0,1',
        ]);
    
        $category = Category::find($requestData['category_id']);
        if (!$category) {
            return response()->json([
                'status' => false,
                'msg' => 'Category not found',
            ]);
        }
    
        $category->status = $requestData['status'];
        $category->save();
    
        $message = $requestData['status'] == 1 ? 'تم تفعيل الفئة بنجاح' : 'تم إلغاء تفعيل الفئة بنجاح';
    
        return response()->json([
            'status' => true,
            'msg' => $message,
        ]);
    
    }
}
