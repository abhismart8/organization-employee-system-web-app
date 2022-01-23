<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    
    public function __construct()
    {
        // 
    }

    public function index(Request $request)
    {
        return view('index', [
        ]);
    }
}
