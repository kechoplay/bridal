<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\MailOrder;
use App\Policy;
use App\SlideImage;
use App\WeddingDressCategory;
use App\DressProduct;
use App\StyleDress;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


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

        return redirect()->back()->with('message', 'Cảm ơn bạn đã liên hê. Chúng tôi sẽ phản hồi bạn sớm nhất có thể.');
    }

    public function shopIndex()
    {
        $dress = DressProduct::orderBy('id', 'desc')->limit(8)->get();
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

    public function introduce()
    {
        $styles = WeddingDressCategory::all();
        $policy = Policy::find(1);
        return view('introduce', compact('policy', 'styles'));
    }

    public function cartIndex()
    {
        $styles = WeddingDressCategory::all();
        $total = 0;
        $arrayCart = null;
        if (Session::has('cart')) {
            $arrayCart = Session::get('cart');
            foreach ($arrayCart as $cart) {
                $total += ($cart['price'] * $cart['number']);

            }
        }
        return view('shop.cart_index', compact( 'styles', 'arrayCart', 'total'));
    }

    public function ajaxCart(Request $request)
    {
        $id = null;
        $flagAction = 0;
        $number = 0;
        $price = 0;
        $arrayCart = null;
        if(!empty($request->id_add)){
            $id = $request->id_add;
            $flagAction = 1;
            if (Session::has('cart')) {
                $arrayCart = Session::get('cart');
                foreach ($arrayCart as &$cart) {
                    if ($cart['id_dress'] == $id) {
                        $cart['number']++;
                        $price = $cart['number'] * $cart['price'];
                        $number = $cart['number'];
                    }
                }
                Session::put('cart',$arrayCart);
             }
        }else if(!empty($request->id_sub)){
            $id = $request->id_sub;
            $price = 0;
            $flagAction = 2;
            if (Session::has('cart')) {
                 $arrayCart = Session::get('cart');
                 foreach ($arrayCart as &$cart) {
                     if ($cart['id_dress'] == $id) {
                            $cart['number']--;
                            $price = $cart['number'] * $cart['price'];
                            $number = $cart['number'];
                     }
                 }
                 Session::put('cart', $arrayCart);
             }

        }else if(!empty($request->id_remove)){
            $id = $request->id_remove;
            $flagAction = 3;
                    if (Session::has('cart')) {
                        $arrayCart = Session::get('cart');
                        foreach ($arrayCart as $key => $cart) {
                            if ($cart['id_dress'] == $id) {
                                unset($arrayCart[$key]);
                            }
                        }
                    }
             Session::put('cart',$arrayCart);
        }
        $total = 0;
        if (Session::has('cart')) {
            $arrayCart = Session::get('cart');
            foreach ($arrayCart as $key => $cart) {
                if ($cart['number'] == 0) {
                    unset($arrayCart[$key]);
                }
            }
            Session::put('cart',$arrayCart);
        }
        if (Session::has('cart')) {
            $arrayCart = Session::get('cart');
            foreach ($arrayCart as $key => $cart) {
                $total += ($cart['price'] * $cart['number']);
            }
        }
        return response()->json(['success' => true,'arrayCart' => $arrayCart, 'total' => $total,
            'flagAction' => $flagAction, 'id' => $id, 'price' => $price,'number'=>$number ], 200);
    }

    public function cartInfo()
    {
        $styles = WeddingDressCategory::all();
        $total = 0;
        $totalNow = 0;
        if (Session::has('cart')) {
            $arrayCart = Session::get('cart');
            foreach ($arrayCart as $cart) {
                $total += ($cart['price']*$cart['number']);
            }
        }else{
            $arrayCart = null;
        }
        if (Session::has('buyNow')) {
            $buyNow = Session::get('buyNow');
        }else{
            $buyNow = null;
        }
        if (Session::has('flagCart')) {
            $flagCart = Session::get('flagCart');
        }else{
            $flagCart = -1;
        }
        return view('shop.cart_info', compact( 'styles', 'arrayCart', 'total','buyNow','flagCart','totalNow'));
    }

    public function orderConfirm(Request $request)
    {
        $styles = WeddingDressCategory::all();
        $total = 0;
        if (Session::has('cart')) {
            $arrayCart = Session::get('cart');
            foreach ($arrayCart as $cart) {
                $total += ($cart['price']*$cart['number']);
            }
        }else{
            $arrayCart = null;
        }
        if (Session::has('buyNow')) {
            $buyNow = Session::get('buyNow');
        }else{
            $buyNow = null;
        }
        if (Session::has('flagCart')) {
            $flagCart = Session::get('flagCart');
        }else{
            $flagCart = -1;
        }
        $data = [
            'email' => $request->email_order,
            'name' => $request->name_order,
            'address' => $request->address_order,
            'phone' => $request->phone_order,
            'note' => $request->note_order,

        ];
        Mail::to($request->email_order)->send(new MailOrder($data,$arrayCart,$buyNow,$flagCart,$total));
        Session::forget('cart');
        Session::forget('buyNow');
        Session::forget('flagCart');
        return view('shop.order_confirm', compact( 'styles', 'arrayCart','total', 'data','buyNow','flagCart'));
    }

    public function ajaxAddCart(Request $request)
    {
        $id_dress = $request->id;
        $name = $request->name;
        $price = $request->price;
        $image = $request->image;
        $slug = $request->slug;
        $flag = 0;
        if (Session::has('cart')) {
            $arrayCart = Session::get('cart');
            foreach ($arrayCart as &$cart) {
                if ($cart['id_dress'] == $id_dress) {
                    $cart['number'] += 1;
                    $flag = 1;
                }
            }
            Session::put('cart',$arrayCart);
            if($flag == 0) {
                Session::push("cart", ['id_dress' => $id_dress, 'name' => $name, 'price' => $price, 'image' => $image, 'slug' => $slug, 'number' => 1]);
            }
        }else{
            Session::push("cart", ['id_dress' => $id_dress, 'name' => $name, 'price' => $price, 'image' => $image, 'slug' => $slug, 'number' => 1]);
        }
        return response()->json(['success' => true], 200);
    }

    public function ajaxBuyNow(Request $request)
    {
        $id_now = $request->id_now;
        $name = $request->name;
        $price = $request->price;
        $image = $request->image;
        $slug = $request->slug;
        if (Session::has('flagCart')) {
            Session::put("flagCart", 1);
        }else{
            Session::push("flagCart", 1);
        }
        if (Session::has('buyNow')) {
            $data = [
                'id_now' => $id_now,
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'slug' => $slug,
                'number' => 1

            ];
            Session::put('buyNow',$data);
        }else{
            Session::push("buyNow", ['id_now' => $id_now, 'name' => $name, 'price' => $price, 'image' => $image, 'slug' => $slug, 'number' => 1]);
        }
        return response()->json(['success' => true], 200);
    }

    public function ajaxBuyCart()
    {
        if (Session::has('flagCart')) {
            Session::put("flagCart", 0);
        }else{
            Session::push("flagCart", 0);
        }
        return response()->json(['success' => true], 200);
    }

}
