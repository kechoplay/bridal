<?php

namespace App\Http\Controllers;

use App\Address;
use App\Contact;
use App\Customers;
use App\Discount;
use App\Mail\MailOrder;
use App\News;
use App\OrderDetail;
use App\Orders;
use App\Policy;
use App\ShippingMethod;
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
                    if ($productList && in_array($dr->id, $productList)) {
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
                    if ($productList && in_array($item->id, $productList)) {
                        $item->sale_price = $item->price - floatval(($item->price * $percent) / 100);
                    }
                }
            }

        }
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        return view('shop.list_products', compact('dress', 'styles', 'isStyle'));
    }


    public function listNew(Request $request)
    {
        $search = $request->keySearch;
        $language = Session::get('language');
        $timeNow = Carbon::now()->format('Y-m-d');
        if (!empty($search)) {
            $listNew = News::query()->where('title_vi', 'like', '%' . $search . '%')
                ->orWhere('title_en', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')->get();

        } else {
            $listNew = News::all();
        }
        foreach ($listNew as $item) {
            if ($language == 'en') {
                $item->name = $item->title_en;
            } else {
                $item->name = $item->title_vi;
            }
        }

        $styles = WeddingDressCategory::all();
        $isStyle = false;
        return view('shop.list_new', compact('listNew', 'styles', 'isStyle'));
    }

    public function newDetail(Request $request)
    {
        $search = $request->keySearch;
        $new = News::query()->where('title_vi', 'like', '%' . $search . '%')
            ->orWhere('title_en', 'like', '%' . $search . '%')
            ->orderBy('id', 'desc')->first();
        $language = Session::get('language');
        if ($language == 'en') {
            $new->title = $new->title_en;
            $new->description = $new->description_en;
        } else {
            $new->title = $new->title_vi;
            $new->description = $new->description_vi;
        }
        $styles = WeddingDressCategory::all();
        return view('shop.new_detail', compact('new','styles'));
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
            $dress = DressProduct::orderBy('id', 'desc')->get();
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
                    if ($productList && in_array($item->id, $productList)) {
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
                    if ($productList && in_array($dr->id, $productList)) {
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
                if ($productList && in_array($dress->id, $productList)) {
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
            ->orderBy('feedback.id', 'desc')
            ->get();
        foreach ($feedBacks as $item) {
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
        $total = 0;
        $arrayCart = null;
        if (Session::has('cart')) {
            $arrayCart = Session::get('cart');
            $language = Session::get('language');
            foreach ($arrayCart as $key => $cart) {
                $product = DressProduct::where('id', $cart['id_dress'])->first();
                if ($language == 'en') {
                    $priceNew = $product->price_en;
                } else {
                    $priceNew = $product->price;
                }
                $arrayCart[$key]['price'] = $priceNew;
                $total += ($priceNew * $cart['number']);
            }
        }
        return view('shop.cart_index', compact('styles', 'arrayCart', 'total'));
    }

    public function ajaxCart(Request $request)
    {
        $id = null;
        $flagAction = 0;
        $number = 0;
        $price = 0;
        $arrayCart = null;
        $language = Session::get('language');
        if (!empty($request->id_add)) {
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
                Session::put('cart', $arrayCart);
            }
        } else if (!empty($request->id_sub)) {
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

        } else if (!empty($request->id_remove)) {
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
            Session::put('cart', $arrayCart);
        }
        $total = 0;
        if (Session::has('cart')) {
            $arrayCart = Session::get('cart');
            foreach ($arrayCart as $key => $cart) {
                if ($cart['number'] == 0) {
                    unset($arrayCart[$key]);
                }
            }
            Session::put('cart', $arrayCart);
        }
        if (Session::has('cart')) {
            $arrayCart = Session::get('cart');
            foreach ($arrayCart as $key => $cart) {
                $product = DressProduct::where('id', $cart['id_dress'])->first();
                if ($language == 'en') {
                    $priceNew = $product->price_en;
                } else {
                    $priceNew = $product->price;
                }
                $arrayCart[$key]['price'] = $priceNew;
                $total += ($priceNew * $cart['number']);
            }
        }
        return response()->json(['success' => true, 'arrayCart' => $arrayCart, 'total' => $total,
            'flagAction' => $flagAction, 'id' => $id, 'price' => $price, 'number' => $number], 200);
    }

    public function cartInfo()
    {
        $styles = WeddingDressCategory::all();
        $total = 0;
        $totalNow = 0;
        if (Session::has('cart')) {
            $arrayCart = Session::get('cart');
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

        $language = Session::get('language');
        $shippingMethod = ShippingMethod::get();
        foreach ($shippingMethod as $item) {
            if ($language == 'en') {
                $item->ship_name = $item->ship_name_en;
                $item->ship_time = $item->ship_time_en;
                $item->ship_fee = $item->ship_fee_en;
            } else {
                $item->ship_name = $item->ship_name_vi;
                $item->ship_time = $item->ship_time_vi;
                $item->ship_fee = $item->ship_fee_vi;
            }
        }

        $customer_id = Auth::guard('customers')->user()->id;
        $address = Address::query()->where('customer_id', $customer_id)->first();
        return view('shop.cart_info', compact('styles', 'arrayCart', 'total', 'buyNow', 'flagCart', 'totalNow', 'address', 'shippingMethod'));
    }

    public function orderConfirm(Request $request)
    {
        DB::beginTransaction();
        try {
            $styles = WeddingDressCategory::all();
            $total = 0;
            $now = Carbon::now()->format('Y-m-d H:i:s');
            $voucherCode = $request->voucher;
            $vouchers = Voucher::where('code', $voucherCode)->where('start_time', '<', $now)->where('end_time', '>', $now)->first();
            if (Session::has('cart')) {
                $arrayCart = Session::get('cart');
                $orders = Orders::create([
                    'name' => $request->name_order,
                    'mobile' => $request->phone_order,
                    'address' => $request->address_order,
                    'email' => $request->email_order,
                    'note' => $request->note_order,
                    'wedding_date' => $request->wedding_date,
                    'shipping_method' => $request->shipping_method,
                    'order_date' => Carbon::now(),
                    'status' => 0,
                ]);
                $userId = Auth::guard('customers')->user()->id;
                foreach ($arrayCart as $cart) {
                    $total += ($cart['price'] * $cart['number']);
                    if ($vouchers) {
                        $price = ceil($cart['price'] - ($cart['price'] * ($vouchers->discount / 100)));
                    } else
                        $price = $cart['price'];
                    OrderDetail::create([
                        'order_id' => $orders->id,
                        'dress_id' => $cart['id_dress'],
                        'quantity' => $cart['number'],
                        'price' => $price
                    ]);
                }
                if ($vouchers) {
                    $total = ceil($total - ($total * ($vouchers->discount / 100)));
                    VoucherUser::create(['voucher_id' => $vouchers->id, 'user_id' => $userId]);
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
            $data = [
                'email' => $request->email_order,
                'name' => $request->name_order,
                'address' => $request->address_order,
                'phone' => $request->phone_order,
                'note' => $request->note_order,
            ];
            Mail::to($request->email_order)->send(new MailOrder($data, $arrayCart, $buyNow, $flagCart, $total));
            Session::forget('cart');
            Session::forget('buyNow');
            Session::forget('flagCart');
            DB::commit();
            return view('shop.order_confirm', compact('styles', 'arrayCart', 'total', 'data', 'buyNow', 'flagCart'));
        } catch (\Exception $exception) {
            Log::error($exception);
            DB::rollBack();
        }

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
            Session::put('cart', $arrayCart);
            if ($flag == 0) {
                Session::push("cart", ['id_dress' => $id_dress, 'name' => $name, 'price' => $price, 'image' => $image, 'slug' => $slug, 'number' => 1]);
            }
        } else {
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

    public function checkVoucher(Request $request)
    {
        $voucher = $request->voucher;
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $vouchers = Voucher::where('code', $voucher)->where('start_time', '<', $now)->where('end_time', '>', $now)->first();
        $total = 0;
        $message = '';
        if ($vouchers) {
            $userId = Auth::guard('customers')->user()->id;
            $voucherUser = VoucherUser::where('voucher_id', $vouchers->id)->where('user_id', $userId)->first();
            if (!$voucherUser) {
                if (Session::has('cart')) {
                    $arrayCart = Session::get('cart');
                    foreach ($arrayCart as $cart) {
                        $total += ($cart['price'] * $cart['number']);
                    }

                    if ($vouchers->discount > 0)
                        $total = ceil($total - ($total * ($vouchers->discount / 100)));
                }
            } else {
                $message = 'Voucher đã đc sử dụng';
            }
        } else {
            $message = 'Voucher not exist';
        }

        return response()->json(['total' => $total, 'message' => $message]);
    }

}
