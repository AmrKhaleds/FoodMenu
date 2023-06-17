<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        $tables = Table::with('room')->get();
        return view('dashboard.inDoor.tables.index', compact('rooms', 'tables'));
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
    public function store(Request $request)
    {
        $table = Table::create($request->all());
        if(!$table){
            toast('حدث خطا اثناء إنشاء الطاولة', 'error');
            return redirect()->route('tables.index');
        }
        toast('تم إنشاء الطاولة بنجاح', 'success');
        return redirect()->route('tables.index');
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
        $table = Table::findOrFail($id);
        $rooms = Room::all();
        return view('dashboard.inDoor.tables.edit', compact('table', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $table = Table::where('id', $id)->update([
            'name' => $request->name,
            'room_id' => $request->room_id,
        ]);
        if($table){
            toast('تم تحديث الطاولة بنجاح', 'success');
            return redirect()->route('tables.index');
        }
        toast('حدث خطا اثناء تحديث الطاولة', 'error');
        return redirect()->route('tables.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $table = Table::findOrFail($id);
        if(!$table)
        {
            toast('لا توجد طاولة بهذا الأسم', 'error');
            return redirect()->route('tables.index');
        }
        $table->delete();
        toast('تم حذف الطاولة بنجاح', 'success');
        return redirect()->route('tables.index');
    }
}
