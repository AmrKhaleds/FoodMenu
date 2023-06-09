<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function import() 
    {
        Excel::import(new UsersImport, public_path('users.xlsx'));
        
        return redirect('/')->with('success', 'All good!');
    }
}
