<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('dashboard.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:png,jpg',
            'banner_type' => 'required|string'
        ]);

        if ($request->hasFile('image')) {
            $photoName = time();
            $image = $request['image'];
            $photoWithOriginalExtention = $photoName . '.' . $request['image']->getClientOriginalExtension();
            $storage_path = 'public/banners/';
            $image->storeAs($storage_path, $photoWithOriginalExtention);
        }

        $banner = Banner::create([
            'image' => $photoWithOriginalExtention,
            'banner_type' => $request['banner_type'],
        ]);

        if ($banner) {
            toast('تم إنشاء الافتة بنجاح', 'success');
            return redirect()->route('banners.create');
        }
        toast('حدث خطأ اثناء العملية', 'error');
        return redirect()->route('banners.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
