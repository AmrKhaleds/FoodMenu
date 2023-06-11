<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Http\Requests\UpdateProductStatusRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('created_at', 'desc')->get();
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('photo')) {
            $photoName = time();
            $image = $request['photo'];
            $photoWithOriginalExtention = $photoName . '.' . $request['photo']->getClientOriginalExtension();
            $storage_path = 'public/products/';
            $image->storeAs($storage_path, $photoWithOriginalExtention);
        }

        $product = Product::create([
            'name' => $requestData['name'],
            'desc' => $requestData['desc'],
            'photo' => $photoWithOriginalExtention ?? 'product_photo.png',
            'price' => $requestData['price'],
            'category_id' => $requestData['category_id'],
        ]);
        if ($product) {
            toast('تم إنشاء المنتج بنجاح', 'success');
            return redirect()->route('products.create');
        }
        toast('حدث خطأ اثناء العملية', 'error');
        return redirect()->route('products.index');
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
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $requestData = $request->except(['_method', '_token']);
        if ($request->hasFile('photo')) {
            $photoName = time();
            $image = $request['photo'];
            $photoWithOriginalExtention = $photoName . '.' . $request['photo']->getClientOriginalExtension();
            $storage_path = 'public/products/';
            $image->storeAs($storage_path, $photoWithOriginalExtention);
        }else{
            $photoWithOriginalExtention = $product->photo;
        }
        $update = $product->update([
            'name' => $requestData['name'],
            'desc' => $requestData['desc'],
            'photo' => $photoWithOriginalExtention,
            'price' => $requestData['price'],
            'category_id' => $requestData['category_id'],
        ]);
        if ($update) {
            toast('تم تحديث المنتج بنجاح', 'success');
            return redirect()->route('products.index');
        }
        toast('حدثت مشكلة اثناء تحديث المنتج', 'error');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {
            toast('تم حذف المنتج بنجاح', 'success');
            return redirect()->route('products.index');
        }
        toast('حدثت مشكلة اثناء حذف المنتج', 'error');
        return redirect()->route('products.index');
    }
    /**
     * Update Product status on change with ajax methodoligy
     */
    public function updateProductStatus(UpdateProductStatusRequest $request){
        $requestData = $request->all();
        $category = Product::findOrFail($requestData['product_id']);

        if (!$category) {
            return response()->json([
                'status' => false,
                'msg' => 'Product not found',
            ]);
        }
        // update status on change
        $category->status = $requestData['status'];
        $category->save();
    
        $message = $requestData['status'] == 1 ? 'تم تفعيل المنتج بنجاح' : 'تم إلغاء تفعيل المنتج بنجاح';

        return response()->json([
            'status' => true,
            'msg' => $message,
        ]);
    
    }
    /**
     * Export Products as Excle Sheet 
     * 
     * @return file
     */
    public function downloadProducts()
    {
        return Excel::download(new ProductsExport, 'Products.xlsx');
    }
    /**
     * Upload Products excle sheet
     * 
     */
    public function uplaodBulkProducts(Request $request)
    {
        if ($request->hasFile('excel')) {
            try {
                Excel::import(new ProductsImport, $request->file('excel'));
                Alert::success('نجاح', 'تم رفع شيت المنتجات بنجاح')->autoClose(false);
            } catch (WithHeadingRow $exception) {
                Alert::error('خطأ', 'تنسيق الملف غير صحيح')->autoClose(false);
            } catch (\Exception $exception) {
                Alert::error('خطأ', 'حدث خطأ أثناء رفع الملف')->autoClose(false);
            }
        }
    
        return redirect()->route('uploadProducts.index');
    }
    /**
     * Delete All products table records
     * 
     */
    public function databaseDestroy()
    {
        try{
            Product::truncate();
            Alert::alert('نجاح', 'تم مسح جميع المنتجات بنجاح', 'success')->autoClose(false);
            return redirect()->route('databaseDestroy.index');
        }catch(Exception $e)
        {
            Alert::alert('فشل', 'حدث خطأ ما', 'error')->autoClose(false);
            return redirect()->route('databaseDestroy.index');
        }
    }
}
