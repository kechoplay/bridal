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
        $hot = DressProduct::query()->where('status','1')->get();
        $special = DressProduct::query()->where('status','2')->get();
        $product = DressProduct::query()->orderBy('created_at','desc')->limit('4')->get();
        $slide = SlideImage::query()->where('status', 1)->get();
        return view('index',compact('category','product','slide'));
    }

    public function hotIndex()
    {
        $product = DressProduct::query()->where('status','1')->get();
        return view('bridal.index', compact('product'));
    }

    public function hotDetails($id)
    {
        $product = DressProduct::query()->where('id',$id)->where('status','1')->get();
        return view('bridal.details', compact('product'));
    }

    public function specialIndex()
    {
        $product = DressProduct::query()->where('status','2')->get();
        return view('runway.index', compact('product'));
    }

    public function newIndex()
    {
        $product = DressProduct::query()->orderBy('created_at','desc')->limit('20')->get();
        return view('bridal.index', compact('product'));
    }

    public function newDetails($id)
    {
        $product = DressProduct::query()->where('id',$id)->get();
        return view('bridal.details', compact('product'));
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
