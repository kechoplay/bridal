<?php

namespace App\Http\Controllers;

use App\Address;
use App\Banner;
use App\Colors;
use App\Contact;
use App\Customers;
use App\Discount;
use App\Mail\MailOrder;
use App\News;
use App\OrderDetail;
use App\Orders;
use App\Policy;
use App\ShippingMethod;
use App\Sizes;
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
            $dr->name = $dr->name_en;
            $dr->price = $dr->price_en;
            if ($discounts->count() > 0) {
                foreach ($discounts as $discount) {
                    $productList = json_decode($discount->product_list, true);
                    $percent = $discount->discount;
                    if ($productList && in_array($dr->id, $productList)) {
                        $dr->sale_price = $dr->price - floatval(($dr->price * $percent) / 100);
                        $dr->discount = $percent;
                    }
                }
            }
        }
//        dd($discounts);
        $styles = WeddingDressCategory::all();
        $banners = Banner::all();
        return view('shop.index', compact('styles', 'dress', 'banners'));
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
            $item->name = $item->name_en;
            $item->price = $item->price_en;
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
            $listNew = News::query()->where('title_en', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')->get();

        } else {
            $listNew = News::all();
        }
        foreach ($listNew as $item) {
            $item->name = $item->title_en;
        }

        $styles = WeddingDressCategory::all();
        $isStyle = false;
        return view('shop.list_new', compact('listNew', 'styles', 'isStyle'));
    }

    public function newDetail(Request $request)
    {
        $search = $request->keySearch;
        $new = News::query()->where('title_en', 'like', '%' . $search . '%')
            ->orderBy('id', 'desc')->first();
        $language = Session::get('language');
        $new->title = $new->title_en;
        $new->description = $new->description_en;
        $styles = WeddingDressCategory::all();
        return view('shop.new_detail', compact('new', 'styles'));
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
            $item->name = $item->name_en;
            $item->price = $item->price_en;
            if ($discounts->count() > 0) {
                foreach ($discounts as $discount) {
                    $productList = json_decode($discount->product_list, true);
                    $percent = $discount->discount;
                    if ($productList && in_array($item->id, $productList)) {
                        $item->sale_price = $item->price - floatval(($item->price * $percent) / 100);
                        $item->discount = $percent;
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
            $dr->name = $dr->name_en;
            $dr->price = $dr->price_en;
            if ($discounts->count() > 0) {
                foreach ($discounts as $discount) {
                    $productList = json_decode($discount->product_list, true);
                    $percent = $discount->discount;
                    if ($productList && in_array($dr->id, $productList)) {
                        $dr->sale_price = $dr->price - floatval(($dr->price * $percent) / 100);
                        $dr->discount = $percent;
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
        $dress = DressProduct::where('slug', $nameProduct)->first();
        if (empty($dress))
            return redirect('/');
        if ($dress->size) {
            $sizes = json_decode($dress->size, true);
            $sizeArr = [];
            foreach ($sizes as $size) {
                $sizeDb = Sizes::find($size);
                $sizeArr[] = $sizeDb;
            }
            $dress->size = $sizeArr;
        }
        if ($dress->color1) {
            $colors = json_decode($dress->color1, true);
            $colorArr = [];
            foreach ($colors as $color) {
                $colorArr[] = Colors::find($color);
            }
            $dress->color1 = $colorArr;
        }
        if ($dress->color2) {
            $colors = json_decode($dress->color2, true);
            $colorArr = [];
            foreach ($colors as $color) {
                $colorArr[] = Colors::find($color);
            }
            $dress->color2 = $colorArr;
        }
        $dress->img_path = json_decode($dress->img_path, true);
        $dress->name = $dress->name_en;
        $dress->price = $dress->price_en;
        $dress->description = $dress->description_en;
        if ($discounts->count() > 0) {
            foreach ($discounts as $discount) {
                $productList = json_decode($discount->product_list, true);
                $percent = $discount->discount;
                if ($productList && in_array($dress->id, $productList)) {
                    $dress->sale_price = $dress->price - floatval(($dress->price * $percent) / 100);
                    $dress->discount = $percent;
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
                $arrayCart[$key]['color_name1'] = Colors::find($cart['color1'])->name_en;
                $arrayCart[$key]['color_name2'] = Colors::find($cart['color2'])->name_en;
                $priceNew = $product->price_en;
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
        if (($request->id_add) != null) {
            $id = $request->id_add;
            $flagAction = 1;
            if (Session::has('cart')) {
                $arrayCart = Session::get('cart');
                foreach ($arrayCart as $key => $cart) {
                    if ($key == $id) {
                        $arrayCart[$key]['number']++;
                    }
                }
                Session::put('cart', $arrayCart);
            }
        }
        if (!is_null($request->id_sub)) {
            $id = $request->id_sub;
            $price = 0;
            $flagAction = 2;
            if (Session::has('cart')) {
                $arrayCart = Session::get('cart');
                foreach ($arrayCart as $key => $cart) {
                    if ($key == $id) {
                        $arrayCart[$key]['number']--;
                    }
                }
                Session::put('cart', $arrayCart);
            }

        }
        if (!is_null($request->id_remove)) {
            $id = $request->id_remove;
            $flagAction = 3;
            if (Session::has('cart')) {
                $arrayCart = Session::get('cart');
                foreach ($arrayCart as $key => $cart) {
                    if ($key == $id) {
                        unset($arrayCart[$key]);
                    }
                }
                $arrayCart = array_values($arrayCart);
            }
            Session::put('cart', $arrayCart);
        }
        return response()->json(['success' => true, 'arrayCart' => $arrayCart,
            'flagAction' => $flagAction, 'id' => $id, 'price' => $price, 'number' => $number], 200);
    }

    public function cartInfo()
    {
        $styles = WeddingDressCategory::all();
        $language = Session::get('language');
        $timeNow = Carbon::now()->format('Y-m-d');
        $discounts = Discount::whereDate('start_time', '<=', $timeNow)->whereDate('end_time', '>=', $timeNow)->get();
        $total = 0;
        $totalNow = 0;
        if (Session::has('buy')) {
            $arrayCart = Session::get('buy');
            foreach ($arrayCart as $key => $cart) {
                $dress = DressProduct::find($cart['id_dress']);
                $arrayCart[$key]['price'] = $dress->price_en;
                if ($discounts->count() > 0) {
                    foreach ($discounts as $discount) {
                        $productList = json_decode($discount->product_list, true);
                        $percent = $discount->discount;
                        if ($productList && in_array($dress->id, $productList)) {
                            $arrayCart[$key]['price'] = $arrayCart[$key]['price'] - floatval(($arrayCart[$key]['price'] * $percent) / 100);
                        }
                    }
                }
                $total += ($arrayCart[$key]['price'] * $cart['number']);
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

        $shippingMethod = ShippingMethod::get();
        foreach ($shippingMethod as $item) {
            $item->ship_name = $item->ship_name_en;
            $item->ship_time = $item->ship_time_en;
            $item->ship_fee = $item->ship_fee_en;
        }

        $customer_id = Auth::guard('customers')->user()->id;
        $address = Address::query()->where('customer_id', $customer_id)->first();
        return view('shop.cart_info', compact('styles', 'arrayCart', 'total', 'buyNow', 'flagCart', 'totalNow', 'address', 'shippingMethod'));
    }

    public function orderConfirm(Request $request)
    {
        DB::beginTransaction();
        try {
//            dd($request->all());
            $styles = WeddingDressCategory::all();
            $language = Session::get('language');
            $timeNow = Carbon::now()->format('Y-m-d');
            $discounts = Discount::whereDate('start_time', '<=', $timeNow)->whereDate('end_time', '>=', $timeNow)->get();
            $total = 0;
            $now = Carbon::now()->format('Y-m-d H:i:s');
            $voucherCode = $request->voucher;
            $vouchers = Voucher::where('code', $voucherCode)->where('start_time', '<', $now)->where('end_time', '>', $now)->first();
            $shippingMethod = ShippingMethod::where('id', $request->shipping_method)->first();
            if (Session::has('buy')) {
                $arrayCart = Session::get('buy');
                $orders = Orders::create([
                    'customer_id' => Auth::guard('customers')->id(),
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
                foreach ($arrayCart as $key => $cart) {
                    $dress = DressProduct::find($cart['id_dress']);
                    $arrayCart[$key]['price'] = $dress->price_en;
                    if ($discounts->count() > 0) {
                        foreach ($discounts as $discount) {
                            $productList = json_decode($discount->product_list, true);
                            $percent = $discount->discount;
                            if ($productList && in_array($dress->id, $productList)) {
                                $arrayCart[$key]['price'] = $arrayCart[$key]['price'] - floatval(($arrayCart[$key]['price'] * $percent) / 100);
                            }
                        }
                    }
                    $total += ($arrayCart[$key]['price'] * $cart['number']);
                    if ($vouchers) {
                        $price = ceil($arrayCart[$key]['price'] - ($arrayCart[$key]['price'] * ($vouchers->discount / 100)));
                    } else
                        $price = $arrayCart[$key]['price'];
                    OrderDetail::create([
                        'order_id' => $orders->id,
                        'dress_id' => $cart['id_dress'],
                        'quantity' => $cart['number'],
                        'price' => $price + $shippingMethod->ship_fee_en,
                        'size' => $cart['size'],
                        'color1' => Colors::find($cart['color1'])->name_en,
                        'color2' => Colors::find($cart['color2'])->name_en,
                    ]);
                    if (Session::has('cart')) {
                        $arrayCartO = Session::get('cart');
                        foreach ($arrayCartO as $key => $item) {
                            if ($cart['id_dress'] == $item['id_dress'] && $cart['size'] == $item['size'] &&
                                $cart['color1'] == $item['color1'] && $cart['color2'] == $item['color2']
                            ) {
                                unset($arrayCartO[$key]);
                            }
                        }
                        $arrayCartO = array_values($arrayCartO);
                        Session::put('cart', $arrayCartO);
                    }
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
            // Mail::to($request->email_order)->send(new MailOrder($data, $arrayCart, $buyNow, $flagCart, $total));
            Session::forget('buy');
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
        $size = $request->size;
        $color1 = $request->color1;
        $color2 = $request->color2;

        $flag = 0;
        if (Session::has('cart')) {
            $arrayCart = Session::get('cart');
            foreach ($arrayCart as &$cart) {
                if ($cart['id_dress'] == $id_dress && $cart['size'] == $size
                    && $cart['color1'] == $color1 && $cart['color2'] == $color2) {
                    $cart['number'] += 1;
                    $flag = 1;
                }
            }
            Session::put('cart', $arrayCart);
            if ($flag == 0) {
                Session::push("cart", [
                    'id_dress' => $id_dress,
                    'name' => $name,
                    'price' => $price,
                    'image' => $image,
                    'slug' => $slug,
                    'size' => $size,
                    'color1' => $color1,
                    'color2' => $color2,
                    'number' => 1
                ]);
            }
        } else {
            Session::push("cart", [
                'id_dress' => $id_dress,
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'slug' => $slug,
                'size' => $size,
                'color1' => $color1,
                'color2' => $color2,
                'number' => 1
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

    public function ajaxBuyCart(Request $request)
    {
        if (Session::has('cart')) {
            $arrayCart = Session::get('cart');
            $productBuy = $request->productBuy;
            $arrayBuy = [];
            foreach ($productBuy as $product) {
                $arrayBuy[] = $arrayCart[$product];
            }
            Session::put('buy', $arrayBuy);
        }
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
        $shipFee = $request->shipFee;
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $vouchers = Voucher::where('code', $voucher)->where('start_time', '<', $now)->where('end_time', '>', $now)->first();
        $total = 0;
        $discount = 0;
        $message = '';
        if ($vouchers) {
            $userId = Auth::guard('customers')->user()->id;
            $voucherUser = VoucherUser::where('voucher_id', $vouchers->id)->where('user_id', $userId)->first();
            if (!$voucherUser) {
                if (Session::has('buy')) {
                    $arrayCart = Session::get('buy');
                    foreach ($arrayCart as $cart) {
                        $total += ($cart['price'] * $cart['number']);
                    }

                    if ($vouchers->discount > 0) {
                        $discount = $total * ($vouchers->discount / 100);
                        $total = ceil($total - ($total * ($vouchers->discount / 100)));
                    }
                }
            } else {
                $message = 'Voucher has been used';
            }
        } else {
            $message = 'Voucher not exist';
        }

        $total += $shipFee;

        return response()->json(['total' => $total, 'message' => $message, 'discount' => $discount]);
    }

    public function addFee(Request $request)
    {
        $voucher = $request->voucher;
        $shipFee = $request->shipFee;
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $total = 0;
        $discount = 0;

        if (Session::has('buy')) {
            $arrayCart = Session::get('buy');
            foreach ($arrayCart as $cart) {
                $total += ($cart['price'] * $cart['number']);
            }
        }
        if ($voucher) {
            $vouchers = Voucher::where('code', $voucher)->where('start_time', '<', $now)->where('end_time', '>', $now)->first();
            $userId = Auth::guard('customers')->user()->id;
            $voucherUser = VoucherUser::where('voucher_id', $vouchers->id)->where('user_id', $userId)->first();
            if (!$voucherUser) {
                if ($vouchers->discount > 0) {
                    $discount = $total * ($vouchers->discount / 100);
                    $total = ceil($total - ($total * ($vouchers->discount / 100)));
                }
            }
        }

        $total += $shipFee;

        return response()->json(['total' => $total, 'discount' => $discount]);
    }
}
