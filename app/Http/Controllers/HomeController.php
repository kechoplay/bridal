<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function bridalIndex()
    {
            return view('bridal.index');
    }

    public function runwayIndex()
    {
            return view('runway.index');
    }

    public function realweddingsIndex()
    {
            return view('real_weddings.index');
    }

    public function contact()
    {
            return view('contact');
    }

    public function listProducts()
    {
            return view('shop.list_products');
    }

    public function productDetails()
    {
            return view('shop.product_details');
    }
}
