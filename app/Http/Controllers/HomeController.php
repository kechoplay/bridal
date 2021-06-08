<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Policy;
use App\SlideImage;
use App\WeddingDressCategory;
use App\DressProduct;
use App\StyleDress;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function homeIndex()
    {
        $bridal = DressProduct::query()->where('status','1')->orderBy('created_at','desc')->first();
        $bridal->img_path = json_decode($bridal->img_path, true);
        $special = DressProduct::query()->where('status','2')->orderBy('created_at','desc')->first();
        $special->img_path = json_decode($special->img_path, true);
        $product = DressProduct::query()->orderBy('created_at','desc')->limit('4')->get();
        foreach ($product as $item) {
            $item->img_path = json_decode( $item->img_path, true);
        }
        $slide = SlideImage::query()->where('status', 1)->get();
        return view('index',compact('bridal','special','product','slide'));
    }

    public function bridalIndex()
    {
        $nameSlug =  url()->current();
        $nameSlug = explode("/", $nameSlug)[3];
        $product = "";
        if($nameSlug == 'bridal-product') {
            $product = DressProduct::query()->where('status','1')->get();
        }
        if($nameSlug == 'new-product') {
            $product = DressProduct::query()->orderBy('created_at', 'desc')->limit('10')->get();
        }
        foreach ($product as $item) {
        $item->img_path = json_decode( $item->img_path, true);
        }
        return view('bridal.index', compact('product','nameSlug'));
    }

    public function bridalDetails($name,$id)
    {
        $nameSlug =  url()->current();
        $nameSlug = explode("/", $nameSlug)[3];
        $product = DressProduct::query()->where('id',$id)->first();
        $product->img_path = json_decode($product->img_path, true);
        return view('bridal.details', compact('product', 'nameSlug'));
    }

    public function specialIndex()
    {
        $product = DressProduct::query()->where('status','2')->get();
        foreach ($product as $item) {
            $item->img_path = json_decode( $item->img_path, true);
        }
        return view('runway.index', compact('product'));
    }


    public function contact()
    {
        $styles = WeddingDressCategory::all();
        return view('contact', compact('styles'));
    }

    public function contactPost(Request $request)
    {
        Contact::create([
            'name' => $request->contact['name'],
            'email' => $request->contact['email'],
            'note' => $request->contact['body'],
        ]);

        return redirect()->back()->with('message', 'Thanks for contacting us. We\'ll get back to you as soon as possible.');
    }

    public function shopIndex()
    {
        $dress = DressProduct::orderBy('id', 'desc')->limit(8)->get();
        foreach ($dress as $dr) {
            $dr->img = json_decode($dr->img_path, true)[0];
        }
        $styles = WeddingDressCategory::all();
        return view('shop.index', compact('styles', 'dress'));
    }

    public function listProducts()
    {
        $dress = DressProduct::paginate(20);
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        return view('shop.list_products', compact('dress', 'styles', 'isStyle'));
    }

    public function listProductsNew()
    {
        $dress = DressProduct::orderBy('id', 'desc')->paginate(20);
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        return view('shop.list_products', compact('dress', 'styles', 'isStyle'));
    }

    public function listProductsStyle(Request $request)
    {
        $slug = $request->style;
        $styleDress = WeddingDressCategory::where('slug', $slug)->first();
        $dress = DressProduct::where('category_id', $styleDress->id)->paginate(20);
        $styles = WeddingDressCategory::all();
        $isStyle = true;
        return view('shop.list_products', compact('dress', 'styles', 'isStyle', 'styleDress'));
    }

    public function productDetails(Request $request)
    {
        $nameProduct = $request->nameProduct;
        $dress = DressProduct::where('slug', $nameProduct)->first();
        $dress->img_path = json_decode($dress->img_path, true);
        $styles = WeddingDressCategory::all();
        if (!$dress) {
            return redirect()->back();
        }
        return view('shop.product_details', compact('dress', 'styles'));
    }

    public function privacyPolicy()
    {
        $styles = WeddingDressCategory::all();
        $policy = Policy::find(1);
        return view('policy', compact('policy', 'styles'));
    }

    public function termOfService()
    {
        $styles = WeddingDressCategory::all();
        $policy = Policy::find(1);
        return view('term_of_service', compact('policy', 'styles'));
    }
}
