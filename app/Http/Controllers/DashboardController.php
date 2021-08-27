<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        // if(Auth::user()->hasRole('user')) {
        //     return view('userdash');
        // }
        // if(Auth::user()->hasRole('blogwriters')) {
        //     return view('blogwritterdash');
        // }
        // if(Auth::user()->hasRole('admin')) {
        //     return view('dashboard');
        // }
        return view('dashboard');
    }

    public function roles() {
        $roles = Role::all();
        return view('roles');
    }    

    public function myprofile() {
        return view('myprofile');
    }    


    public function postcreate() {
        return view('postcreate');
    }      
}
