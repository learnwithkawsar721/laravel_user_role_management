<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class BackendController extends Controller
{
    public function index(){
       return view('backend.pages.dashboard');
    }
}
