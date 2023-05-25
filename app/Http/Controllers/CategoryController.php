<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
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
        
        Category::create($request->all());
        toastr()->success('تم انشاء الفئة بنجاح');
        return redirect()->route('categories.index');
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
        $requestData = $request->only(['name']);
        $category = Category::where('id', $id)->update($requestData);
        if($category){
            toastr()->success('تم تعديل الفئة بنجاح');
            return redirect()->route('categories.index');
        }
        toastr()->error('حدثت مشكلة اثناء تحديث الفئة');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->delete()){
            toastr()->success('تم حذف الفئة بنجاح');
            return redirect()->route('categories.index');
        }
        toastr()->error('حدثت مشكلة اثناء حذف الفئة');
        return redirect()->route('categories.index');
    }
}
