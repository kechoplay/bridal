<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BridalController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('admin.bridal.index');
    }

    public function create(Request $request)
    {
        return view('admin.bridal.add');
    }
}
