<?php

namespace App\Http\Controllers;

use App\Contact;
use App\WeddingDressCategory;
use App\DressProduct;
use App\StyleDress;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function homeIndex()
    {
        $category = WeddingDressCategory::query()->orderBy('created_at','desc')->limit('2')->get();
        $product = DressProduct::query()->orderBy('created_at','desc')->limit('3')->get();
        return view('index',compact('category'));
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
        $styles = StyleDress::all();
        return view('shop.index', compact('styles'));
    }

    public function listProducts()
    {
        $dress = DressProduct::paginate(20);
        $styles = StyleDress::all();
        return view('shop.list_products', compact('dress', 'styles'));
    }

    public function listProductsStyle(Request $request)
    {
        $slug = $request->style;
        $styleDress = StyleDress::where('slug', $slug)->first();
        $dress = DressProduct::where('style', $styleDress->id)->paginate(20);
        $styles = StyleDress::all();
        return view('shop.list_products', compact('dress', 'styles'));
    }

    public function productDetails()
    {
        return view('shop.product_details');
    }
}
