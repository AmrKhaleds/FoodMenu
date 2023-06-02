<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd("done");
        return view('dashboard.settings.index');
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
    public function store(Request $request,
    GeneralSettings $settings)
    {
        $settings->site_name = $request->input('site_name');
        $settings->about_us = $request->input('about_us');
        $settings->site_logo = $request->input('site_logo');
        $settings->email = $request->input('email');
        $settings->phone = $request->input('phone');
        $settings->copyright = $request->input('copyright');
        
        $settings->save();
        // dd(config('app.timezone'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
