<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
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
    public function store(Request $request)
    {
        
        Category::create($request->all());
        return redirect()->route('categories.index')->with(['success' => 'تم انشاء الفئة بنجاح']);
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
    public function update(Request $request, $id)
    {
        $requestData = $request->only(['name']);
        $category = Category::where('id', $id)->update($requestData);
        if($category){
            return redirect()->route('categories.index')->with(['success' => 'تم تعديل الفئة بنجاح']);
        }
        return redirect()->route('categories.index')->with(['error' => 'حدثت مشكلة اثناء تحديث الفئة']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->delete()){
            return redirect()->route('categories.index')->with(['success' => 'تم حذف الفئة بنجاح']);
        }
        return redirect()->route('categories.index')->with(['error' => 'حدثت مشكلة اثناء حذف الفئة']);
    }
}
