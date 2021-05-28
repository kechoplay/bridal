<?php

namespace App\Http\Controllers;

use App\Contact;
use App\SlideImage;
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
        $product = DressProduct::query()->orderBy('created_at','desc')->limit('4')->get();
        $slide = SlideImage::query()->where('status', 1)->get();
        return view('index',compact('category','product','slide'));
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
        $product = DressProduct::query()->get();
        return view('runway.index', compact('product'));
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

        return redirect()->back()->with('message', 'Gửi thông tin thành công!');
    }

    public function shopIndex()
    {
        $dress = DressProduct::orderBy('id', 'desc')->take(8);
        foreach ($dress as $dr) {
            $dr->img = json_decode($dr->img_path, true);
        }
        $styles = WeddingDressCategory::all();
        return view('shop.index', compact('styles', 'dress'));
    }

    public function listProducts()
    {
        $dress = DressProduct::paginate(20);
        $styles = WeddingDressCategory::all();
        return view('shop.list_products', compact('dress', 'styles'));
    }

    public function listProductsStyle(Request $request)
    {
        $slug = $request->style;
        $styleDress = WeddingDressCategory::where('slug', $slug)->first();
        $dress = DressProduct::where('category_id', $styleDress->id)->paginate(20);
        $styles = WeddingDressCategory::all();
        return view('shop.list_products', compact('dress', 'styles'));
    }

    public function productDetails()
    {
        return view('shop.product_details');
    }
}
