<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        if(auth()->user()->id == $user->id){
            return view('dashboard.profiles.index', compact('user'));
        }
            
    }
}
