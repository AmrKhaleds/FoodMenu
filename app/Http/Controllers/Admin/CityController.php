<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::with('place')->get();

        return view('dashboard.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {
        $city = City::create($request->all());
        if($city){
            toast('تم إضافة المدينة بنجاح', 'success');
            return redirect()->route('cities.index');
        }
        toast('حدث خطا اثناء إنشاء المدينة', 'error');
        return redirect()->route('cities.index');
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
        $city = City::findOrFail($id);
        return view('dashboard.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, string $id)
    {
        $city = City::where('id', $id)->update([
            'name' => $request->name,
        ]);
        if($city){
            toast('تم تحديث المدينة بنجاح', 'success');
            return redirect()->route('cities.index');
        }
        toast('حدث خطا اثناء تحديث المدينة', 'error');
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::findOrFail($id);
        if(!$city)
        {
            toast('لا توجد مدينة بهذا الأسم', 'error');
            return redirect()->route('cities.index');
        }
        $city->delete();
        toast('تم حذف المدينة بنجاح', 'success');
        return redirect()->route('cities.index');
    }
}
