<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeIndex()
    {
        return view('index');
    }

    public function bridalIndex()
    {
            return view('bridal.index');
    }

    public function bridalDetails()
    {
        return view('bridal.details');
    }

    public function runwayIndex()
    {
            return view('runway.index');
    }

    public function realWeddingsIndex()
    {
            return view('real_weddings.index');
    }

    public function realWeddingsDetails()
    {
        return view('real_weddings.details');
    }

    public function contact()
    {
            return view('contact');
    }

    public function contactPost(Request $request)
    {
        Contact::create([
           'type_dress' => $request->style_dress,
           'name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'address' => $request->address,
           'note' => $request->note,
        ]);

        return redirect()->back()->with('message', 'Save contact success!');
    }

    public function shopIndex()
    {
        return view('shop.index');
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
