<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaceRequest;
use App\Models\City;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::with('city')->get();
        $cities = City::all();
        return view('dashboard.places.index', compact('places', 'cities'));
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
    public function store(PlaceRequest $request)
    {
        $place = Place::create($request->all());
        if($place){
            toast('تم إضافة المكان بنجاح', 'success');
            return redirect()->route('places.index');
        }
        toast('حدث خطا اثناء إنشاء المكان', 'error');
        return redirect()->route('places.index');
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
        $cities = City::all();
        $place = Place::findOrFail($id);
        return view('dashboard.places.edit', compact('place', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlaceRequest $request, string $id)
    {
        $place = Place::where('id', $id)->update([
            'name' => $request->name,
            'tax' => $request->tax,
            'city_id' => $request->city_id,
        ]);
        if($place){
            toast('تم تحديث المكان بنجاح', 'success');
            return redirect()->route('places.index');
        }
        toast('حدث خطا اثناء تحديث المكان', 'error');
        return redirect()->route('places.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $place = Place::findOrFail($id);
        if(!$place)
        {
            toast('لا يوجد مكان بهذا الأسم', 'error');
            return redirect()->route('places.index');
        }
        $place->delete();
        toast('تم حذف المكان بنجاح', 'success');
        return redirect()->route('places.index');
    }
}
