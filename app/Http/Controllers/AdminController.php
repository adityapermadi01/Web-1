<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (auth::user()->usertype == 'admin') {
            return view('admin.halamanadmin');
        } else {
            return view('admin.halamanuser');
        }
    }
}
