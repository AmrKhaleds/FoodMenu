<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::with('table')->get();
        return view('dashboard.inDoor.rooms.index', compact('rooms'));
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
    public function store(RoomRequest $request)
    {
        // dd($request->all());
        $room = Room::create($request->all());
        if($room){
            toast('تم إضافة القاعة بنجاح', 'success');
            return redirect()->route('rooms.index');
        }
        toast('حدث خطا اثناء إنشاء القاعة', 'error');
        return redirect()->route('rooms.index');
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
        $room = Room::findOrFail($id);
        return view('dashboard.inDoor.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, string $id)
    {
        $room = Room::where('id', $id)->update([
            'name' => $request->name,
        ]);
        if($room){
            toast('تم تحديث القاعة بنجاح', 'success');
            return redirect()->route('rooms.index');
        }
        toast('حدث خطا اثناء تحديث القاعة', 'error');
        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::findOrFail($id);
        if(!$room)
        {
            toast('لا توجد قاعة بهذا الأسم', 'error');
            return redirect()->route('rooms.index');
        }
        $room->delete();
        toast('تم حذف القاعة بنجاح', 'success');
        return redirect()->route('rooms.index');
    }
}
