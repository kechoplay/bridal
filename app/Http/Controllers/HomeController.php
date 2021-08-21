<?php

namespace App\Http\Controllers;

use App\Address;
use App\Cart;
use App\Contact;
use App\Customers;
use App\Discount;
use App\Mail\MailOrder;
use App\OrderDetail;
use App\Orders;
use App\Policy;
use App\SlideImage;
use App\Voucher;
use App\VoucherUser;
use App\WeddingDressCategory;
use App\DressProduct;
use App\StyleDress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    public function homeIndex()
    {
        $bridal = DressProduct::query()->where('status', '1')->orderBy('created_at', 'desc')->first();
        $bridal->img_path = json_decode($bridal->img_path, true);
        $special = DressProduct::query()->where('status', '2')->orderBy('created_at', 'desc')->first();
        $special->img_path = json_decode($special->img_path, true);
        $product = DressProduct::query()->orderBy('created_at', 'desc')->limit('4')->get();
        foreach ($product as $item) {
            $item->img_path = json_decode($item->img_path, true);
        }
        $slide = SlideImage::query()->where('status', 1)->get();
        return view('index', compact('bridal', 'special', 'product', 'slide'));
    }

    public function bridalIndex()
    {
        $nameSlug = url()->current();
        $nameSlug = explode("/", $nameSlug)[3];
        $product = "";
        if ($nameSlug == 'bridal-product') {
            $product = DressProduct::query()->where('status', '1')->get();
        }
        if ($nameSlug == 'new-product') {
            $product = DressProduct::query()->orderBy('created_at', 'desc')->limit('10')->get();
        }
        foreach ($product as $item) {
            $item->img_path = json_decode($item->img_path, true);
        }
        return view('bridal.index', compact('product', 'nameSlug'));
    }

    public function bridalDetails($name, $id)
    {
        $nameSlug = url()->current();
        $nameSlug = explode("/", $nameSlug)[3];
        $product = DressProduct::query()->where('id', $id)->first();
        $product->img_path = json_decode($product->img_path, true);
        return view('bridal.details', compact('product', 'nameSlug'));
    }

    public function specialIndex()
    {
        $product = DressProduct::query()->where('status', '2')->get();
        foreach ($product as $item) {
            $item->img_path = json_decode($item->img_path, true);
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
        $language = Session::get('language');
        $timeNow = Carbon::now()->format('Y-m-d');
        $discounts = Discount::whereDate('start_time', '<=', $timeNow)->whereDate('end_time', '>=', $timeNow)->get();
        foreach ($dress as $dr) {
            $dr->img = json_decode($dr->img_path, true);
            if ($language == 'en') {
                $dr->name = $dr->name_en;
                $dr->price = $dr->price_en;
            }
            if ($discounts->count() > 0) {
                foreach ($discounts as $discount) {
                    $productList = json_decode($discount->product_list, true);
                    $percent = $discount->discount;
                    if (in_array($dr->id, $productList)) {
                        $dr->sale_price = $dr->price - floatval(($dr->price * $percent) / 100);
                    }
                }
            }
        }
//        dd($discounts);
        $styles = WeddingDressCategory::all();
        return view('shop.index', compact('styles', 'dress'));
    }

    public function listProducts(Request $request)
    {
        $search = $request->keySearch;
        $language = Session::get('language');
        $timeNow = Carbon::now()->format('Y-m-d');
        $discounts = Discount::whereDate('start_time', '<=', $timeNow)->whereDate('end_time', '>=', $timeNow)->get();
        if (!empty($search)) {
            $dress = DressProduct::where('name', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')->get();
        } else {
            $dress = DressProduct::all();
        }

        foreach ($dress as $item) {
            if ($language == 'en') {
                $item->name = $item->name_en;
                $item->price = $item->price_en;
            }
            if ($discounts->count() > 0) {
                foreach ($discounts as $discount) {
                    $productList = json_decode($discount->product_list, true);
                    $percent = $discount->discount;
                    if (in_array($item->id, $productList)) {
                        $item->sale_price = $item->price - floatval(($item->price * $percent) / 100);
                    }
                }
            }

        }
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        return view('shop.list_products', compact('dress', 'styles', 'isStyle'));
    }

    public function listProductsNew(Request $request)
    {
        $timeNow = Carbon::now()->format('Y-m-d');
        $discounts = Discount::whereDate('start_time', '<=', $timeNow)->whereDate('end_time', '>=', $timeNow)->get();
        $search = $request->keySearch;
        if (!empty($search)) {
            $dress = DressProduct::where('name', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')->get();
        } else {
            $dress = DressProduct::orderBy('id', 'desc')->all();
        }
        $styles = WeddingDressCategory::all();
        $language = Session::get('language');

        foreach ($dress as $item) {
            if ($language == 'en') {
                $item->name = $item->name_en;
                $item->price = $item->price_en;
            }
            if ($discounts->count() > 0) {
                foreach ($discounts as $discount) {
                    $productList = json_decode($discount->product_list, true);
                    $percent = $discount->discount;
                    if (in_array($item->id, $productList)) {
                        $item->sale_price = $item->price - floatval(($item->price * $percent) / 100);
                    }
                }
            }
        }
        $isStyle = false;
        return view('shop.list_products', compact('dress', 'styles', 'isStyle'));
    }

    public function listProductsStyle(Request $request)
    {
        $timeNow = Carbon::now()->format('Y-m-d');
        $discounts = Discount::whereDate('start_time', '<=', $timeNow)->whereDate('end_time', '>=', $timeNow)->get();
        $slug = $request->style;
        $styleDress = WeddingDressCategory::where('slug', $slug)->first();
        $search = $request->keySearch;
        if (!empty($search)) {
            $dress = DressProduct::where('category_id', $styleDress->id)->where('name', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')->orderBy('id', 'desc')->get();
        } else {
            $dress = DressProduct::where('category_id', $styleDress->id)->orderBy('id', 'desc')->get();
        }
        $language = Session::get('language');
        foreach ($dress as $dr) {
            if ($language == 'en') {
                $dr->name = $dr->name_en;
                $dr->price = $dr->price_en;
            }
            if ($discounts->count() > 0) {
                foreach ($discounts as $discount) {
                    $productList = json_decode($discount->product_list, true);
                    $percent = $discount->discount;
                    if (in_array($dr->id, $productList)) {
                        $dr->sale_price = $dr->price - floatval(($dr->price * $percent) / 100);
                    }
                }
            }
        }
        $styles = WeddingDressCategory::all();
        $isStyle = true;
        return view('shop.list_products', compact('dress', 'styles', 'isStyle', 'styleDress'));
    }

    public function productDetails(Request $request)
    {
        $timeNow = Carbon::now()->format('Y-m-d');
        $discounts = Discount::whereDate('start_time', '<=', $timeNow)->whereDate('end_time', '>=', $timeNow)->get();
        $nameProduct = $request->nameProduct;
        $language = Session::get('language');
        $dress = DressProduct::where('slug', $nameProduct)->first();
        $dress->img_path = json_decode($dress->img_path, true);
        if ($language == 'en') {
            $dress->name = $dress->name_en;
            $dress->price = $dress->price_en;
            $dress->description = $dress->description_en;
        }
        if ($discounts->count() > 0) {
            foreach ($discounts as $discount) {
                $productList = json_decode($discount->product_list, true);
                $percent = $discount->discount;
                if (in_array($dress->id, $productList)) {
                    $dress->sale_price = $dress->price - floatval(($dress->price * $percent) / 100);
                }
            }
        }
        $styles = WeddingDressCategory::all();
        if (!$dress) {
            return redirect()->back();
        }
        $feedBacks = DB::table('feedback')
            ->where('product_id', $dress->id)
            ->join('customers', 'feedback.user_id', '=', 'customers.id')
            ->get();
        foreach ($feedBacks as $item ){
            $item->time = date("d/m/Y", strtotime($item->created_at));
            $item->list_image = json_decode($item->list_image, true);
        }
        return view('shop.product_details', compact('dress', 'styles', 'feedBacks'));
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
        $customer_id = Auth::guard('customers')->user()->id;
        $total = 0;
        $arrayCart = Cart::query()->where('customer_id', $customer_id)->get()->toArray();
        if ($arrayCart) {
            foreach ($arrayCart as $cart) {
                $total += ($cart['price'] * $cart['number']);
            }
        }
//        if (Session::has('cart')) {
//            $arrayCart = Session::get('cart');
//            foreach ($arrayCart as $cart) {
//                $total += ($cart['price'] * $cart['number']);
//
//            }
//        }
        return view('shop.cart_index', compact('styles', 'arrayCart', 'total'));
    }

    public function ajaxCart(Request $request)
    {
        $id = null;
        $flagAction = 0;
        $number = 0;
        $price = 0;
        $arrayCart = null;
        if (!empty($request->id_add)) {
            $id = $request->id_add;
            $flagAction = 1;
            $cart = Cart::query()->where('id', $id)->first();
            if ($cart) {
                Cart::query()->where('id', $id)->update(['number' => ($cart->number + 1)]);
                $price = ($cart->number + 1) * $cart->price;
                $number = $cart->number + 1;
            }

        } else if (!empty($request->id_sub)) {
            $id = $request->id_sub;
            $flagAction = 2;
            $cart = Cart::query()->where('id', $id)->first();
            if ($cart) {
                if (($cart->number - 1) == 0) {
                    Cart::query()->where('id', $id)->delete();
                } else {
                    Cart::query()->where('id', $id)->update(['number' => ($cart->number - 1)]);
                    $price = ($cart->number - 1) * $cart->price;
                    $number = $cart->number - 1;
                }
            }

        } else if (!empty($request->id_remove)) {
            $id = $request->id_remove;
            $flagAction = 3;
            Cart::query()->where('id', $id)->delete();
        }
        $total = 0;
        $customer_id = Auth::guard('customers')->user()->id;
        $arrayCart = Cart::query()->where('customer_id', $customer_id)->get()->toArray();
        foreach ($arrayCart as $key => $cart) {
            $total += ($cart['price'] * $cart['number']);
        }
        return response()->json(['success' => true, 'arrayCart' => $arrayCart, 'total' => $total,
            'flagAction' => $flagAction, 'id' => $id, 'price' => $price, 'number' => $number], 200);
    }

    public function cartInfo()
    {
        $styles = WeddingDressCategory::all();
        $total = 0;
        $totalNow = 0;
        $customer_id = Auth::guard('customers')->user()->id;
        $arrayCart = Cart::query()->where('customer_id', $customer_id)->get()->toArray();
        if ($arrayCart) {
            foreach ($arrayCart as $cart) {
                $total += ($cart['price'] * $cart['number']);
            }
        } else {
            $arrayCart = null;
        }
        if (Session::has('buyNow')) {
            $buyNow = Session::get('buyNow');
        } else {
            $buyNow = null;
        }
        if (Session::has('flagCart')) {
            $flagCart = Session::get('flagCart')[0];
        } else {
            $flagCart = -1;
        }
        $address = Address::query()->where('customer_id', $customer_id)->first();
        return view('shop.cart_info', compact('styles', 'arrayCart', 'total', 'buyNow', 'flagCart', 'totalNow', 'address'));
    }

    public function orderConfirm(Request $request)
    {
        DB::beginTransaction();
        try {
            $styles = WeddingDressCategory::all();
            $total = 0;
            $customer_id = Auth::guard('customers')->user()->id;
            if (!Session::has('flagCart')) {
                return redirect()->route('homeIndex');
            }
            $voucherCode = $request->voucher_code;
            $discount = null;
            $totalDiscount = null;
            if ($voucherCode) {
                $voucher = Voucher::query()->where('code', $voucherCode)->where('status', 0)->first();
                $discount = $voucher->discount;
                $userVoucher = VoucherUser::query()->create([
                    'voucher_id' => $voucher->id,
                    'user_id' => $customer_id,
                ]);
            }
            $arrayCart = Cart::query()->where('customer_id', $customer_id)->get()->toArray();
            if ($arrayCart) {
                $orders = Orders::create([
                    'name' => $request->name_order,
                    'mobile' => $request->phone_order,
                    'address' => $request->address_order,
                    'email' => $request->email_order,
                    'note' => $request->note_order,
//                'total' => $total,
                    'order_date' => Carbon::now(),
                    'status' => 0,
                ]);
                foreach ($arrayCart as $cart) {
                    $total += ($cart['price'] * $cart['number']);
                    OrderDetail::create([
                        'order_id' => $orders->id,
                        'dress_id' => $cart['product_id'],
                        'quantity' => $cart['number'],
                        'price' => $cart['price']
                    ]);
                }
                if ($discount) {
                    $totalDiscount = ($total * $discount) / 100;
                }
            } else {
                $arrayCart = null;
            }
            if (Session::has('buyNow')) {
                $buyNow = Session::get('buyNow');
                if ($discount) {
                    $totalDiscount = ($buyNow['price'] * $discount) / 100;
                }
            } else {
                $buyNow = null;
            }
            if (Session::has('flagCart')) {
                $flagCart = Session::get('flagCart')[0];
            } else {
                $flagCart = -1;
            }
            $data = [
                'email' => $request->email_order,
                'name' => $request->name_order,
                'address' => $request->address_order,
                'phone' => $request->phone_order,
                'note' => $request->note_order,
            ];
            Mail::to($request->email_order)->send(new MailOrder($data, $arrayCart, $buyNow, $flagCart, $total));
            $arrayCart = Cart::query()->where('customer_id', $customer_id)->get();
            foreach ($arrayCart as $cart) {
                $cart->delete();
            }
            Session::forget('buyNow');
            Session::forget('flagCart');
            DB::commit();
            $arrayCart = OrderDetail::query()->leftJoin('dress_product', 'order_detail.dress_id', 'dress_product.id')
                ->where('order_detail.order_id', $orders->id)->get();
            foreach ($arrayCart as $item) {
                $item->img_path = json_decode($item->img_path, true)[0];
            }
            return view('shop.order_confirm', compact('styles', 'arrayCart', 'total', 'data', 'buyNow', 'flagCart', 'discount', 'totalDiscount'));
        } catch (\Exception $exception) {
            Log::error($exception);
            DB::rollBack();
        }

    }

    public function ajaxAddCart(Request $request)
    {
        $customer_id = Auth::guard('customers')->user()->id;
        $id_dress = $request->id;
        $name = $request->name;
        $price = $request->price;
        $image = $request->image;
        $size = $request->size;
        $color = $request->color;
        $slug = $request->slug;
        $cart_old = Cart::query()->where('product_id', $id_dress)->where('customer_id', $customer_id)
            ->where('size', $size)->where('color', $color)->first();
        if ($cart_old) {
            Cart::query()->where('id', $cart_old->id)->update([
                'number' => $cart_old->number + 1,
                'price' => $price,
            ]);
        } else {
            Cart::query()->create([
                'customer_id' => $customer_id,
                'product_id' => $id_dress,
                'name' => $name,
                'image' => $image,
                'size' => $size,
                'color' => $color,
                'slug' => $slug,
                'number' => 1,
                'price' => $price,
            ]);
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
        } else {
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
            Session::put('buyNow', $data);
        } else {
            Session::push("buyNow", ['id_now' => $id_now, 'name' => $name, 'price' => $price, 'image' => $image, 'slug' => $slug, 'number' => 1]);
        }
        return response()->json(['success' => true], 200);
    }

    public function ajaxBuyCart()
    {
        if (Session::has('flagCart')) {
            Session::put("flagCart", 0);
        } else {
            Session::push("flagCart", 0);
        }
        return response()->json(['success' => true], 200);
    }

    public function checkDiscount(Request $request)
    {
        $code = $request->code;
        $voucher = Voucher::query()->where('code', $code)->first();
        if (!$voucher) {
            return response()->json(['success' => false, 'msg' => 'The voucher is invalid'], 200);
        }
        if ($voucher->status == 1) {
            return response()->json(['success' => false, 'msg' => 'The voucher has expired'], 200);
        }
        if ($voucher->status == 0 && strtotime($voucher->start_time) > time()) {
            return response()->json(['success' => false, 'msg' => 'The voucher is invalid'], 200);
        }
        if ($voucher->status == 0 && strtotime($voucher->start_time) < time() && strtotime($voucher->end_time) > time()) {
            $customer_id = Auth::guard('customers')->user()->id;
            $checkVoucher = VoucherUser::query()->where('user_id', $customer_id)->where('voucher_id', $voucher->id)->first();
            if ($checkVoucher) {
                return response()->json(['success' => false, 'msg' => 'The voucher has been used'], 200);
            } else {
                return response()->json(['success' => true, 'discount' => $voucher->discount], 200);
            }
        }

    }
}
