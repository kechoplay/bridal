<?php

namespace App\Http\Controllers\Admin;

use App\Colors;
use App\Contact;
use App\Discount;
use App\DressProduct;
use App\OrderDetail;
use App\Orders;
use App\Policy;
use App\ShippingMethod;
use App\Sizes;
use App\StyleDress;
use App\User;
use App\Voucher;
use App\VoucherUser;
use App\WeddingDressCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class BridalController extends Controller
{
    //
    public function index(Request $request)
    {
        $dress = DressProduct::with(['colorDress', 'colorFlower', 'sizes'])->orderBy('id', 'DESC')->get();
        foreach ($dress as $dr) {
            $dr->image = json_decode($dr->img_path, true)[0];
        }
        return view('admin.bridal.index', compact('dress'));
    }

    public function create(Request $request)
    {
        $styles = WeddingDressCategory::all();
        $colors = Colors::all();
        $sizes = Sizes::all();
        return view('admin.bridal.add', compact('styles', 'colors', 'sizes'));
    }

    public function store(Request $request)
    {
        $nameVi = $request->name;
        $nameEn = $request->name_en;
        $color1 = $request->color1;
        $color2 = $request->color2;
        $processTime = $request->process_time;
        $size = $request->size;
        $images = $request->images;
        $description = $request->description;
        $descriptionEn = $request->description_en;
        $style = $request->style;
        $price = $request->price;
        $priceEn = $request->price_en;

        $path = public_path('image');
        if (!File::exists($path))
            File::makeDirectory($path, 0777, true);
        $imageList = [];
        foreach ($images as $key => $image) {
            $name = $key . time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $name);
            $imageList[] = '/image/' . $name;
        }

        DressProduct::create([
            'name' => $nameVi,
            'name_en' => $nameEn,
            'price' => $price,
            'price_en' => $priceEn,
            'color1' => $color1,
            'color2' => $color2,
            'size' => $size,
            'process_time' => $processTime,
            'img_path' => json_encode($imageList),
            'description' => $description,
            'description_en' => $descriptionEn,
            'category_id' => $style,
            'slug' => Str::slug($nameVi)
        ]);

        return redirect()->route('admin.index');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $dress = DressProduct::find($id);
        $styles = WeddingDressCategory::all();
        $dress->img_path = json_decode($dress->img_path, true);
        $processTimeArr = explode(' - ', $dress->process_time);
        if ($dress->process_time) {
            $dress->start_time = $processTimeArr[0];
            $dress->end_time = $processTimeArr[1];
        } else {
            $dress->start_time = Carbon::now()->format('d-m-Y');
            $dress->end_time = Carbon::now()->format('d-m-Y');
        }
        $colors = Colors::all();
        $sizes = Sizes::all();

        return view('admin.bridal.edit', compact('dress', 'styles', 'colors', 'sizes'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $nameDress = $request->name;
        $nameEn = $request->name_en;
        $color1 = $request->color1;
        $color2 = $request->color2;
        $processTime = $request->process_time;
        $size = $request->size;
        $images = $request->images;
        $description = $request->description;
        $descriptionEn = $request->description_en;
        $style = $request->style;
        $price = $request->price;
        $priceEn = $request->price_en;

        $dress = DressProduct::find($id);
        $path = public_path('image');

        if (!File::exists($path))
            File::makeDirectory($path, 0777, true);

        if ($images) {
            $imageList = [];
            foreach ($images as $key => $image) {
                $name = $key . time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $name);
                $imageList[] = '/image/' . $name;
            }
        } else {
            $imageList = json_decode($dress->img_path, true);
        }

        DressProduct::where('id', $id)->update([
            'name' => $nameDress,
            'name_en' => $nameEn,
            'price' => $price,
            'price_en' => $priceEn,
            'color1' => $color1,
            'color2' => $color2,
            'size' => $size,
            'process_time' => $processTime,
            'img_path' => json_encode($imageList),
            'description' => $description,
            'description_en' => $descriptionEn,
            'category_id' => $style,
            'slug' => Str::slug($nameDress)
        ]);

        return redirect()->route('admin.index');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $dress = DressProduct::find($id);
        try {
            $images = json_decode($dress->img_path, true);
            foreach ($images as $img) {
                unlink(public_path($img));
            }
        } catch (\Exception $exception) {
            Log::error($exception);
        }
        $dress->delete();

        return redirect()->route('admin.index');
    }

    public function listStyle()
    {
        $styles = WeddingDressCategory::all();
        return view('admin.style.list_style', compact('styles'));
    }

    public function addStyle()
    {
        return view('admin.style.add_style');
    }

    public function saveStyle(Request $request)
    {
        $name = $request->name;
        $image = $request->image;

        $path = public_path('image_style');
        if (!File::exists($path))
            File::makeDirectory($path, 0777, true);

        $nameImage = 'style_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move($path, $nameImage);

        WeddingDressCategory::create([
            'name' => $name,
            'slug' => Str::slug($name),
            'img_category' => '/image_style/' . $nameImage
        ]);
        return redirect()->route('admin.listStyle');
    }

    public function editStyle(Request $request)
    {
        $id = $request->id;
        $style = WeddingDressCategory::find($id);
        return view('admin.style.edit_style', compact('style'));
    }

    public function updateStyle(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $image = $request->image;

        $style = WeddingDressCategory::find($id);
        $path = public_path('image_style');
        if (!File::exists($path))
            File::makeDirectory($path, 0777, true);

        if ($image) {
            $nameImage = 'style_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $nameImage);
            $imgPath = '/image_style/' . $nameImage;
        } else {
            $imgPath = $style->img_category;
        }

        WeddingDressCategory::where('id', $id)->update([
            'name' => $name,
            'slug' => Str::slug($name),
            'img_category' => $imgPath
        ]);

        return redirect()->route('admin.listStyle');
    }

    public function deleteStyle(Request $request)
    {
        $id = $request->id;
        $dress = DressProduct::where('category_id', $id)->first();
        if ($dress) {
            $errors = ['Có sản phẩm trong mẫu này. Hãy xóa nó trước'];
            Session::flash('errors', $errors);
            return redirect()->back();
        }

        WeddingDressCategory::find($id)->delete();
        return redirect()->route('admin.listStyle');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $notice = '';
        $validate = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required'
            ]
        );
        $password = $request->input('password');
        $username = $request->input('username');
        $remember_me = $request->input('remember_me');
        ($remember_me == 1) ? $remember_me = true : $remember_me = false;
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        if (!Auth::attempt(['username' => $username, 'password' => $password], true)) {
            $notice = "Tên đăng nhập hoặc mật khẩu k chính xác";
            return redirect()->back()->withInput(['notice' => $notice, 'username' => $username, 'password' => $password]);
        }

        return redirect('/admin/');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();

        return redirect()->route('admin.login');

    }

    public function policy()
    {
        $policy = Policy::find(1);
        return view('admin.policy', compact('policy'));
    }

    public function savePolicy(Request $request)
    {
        $policy = $request->policy;
        $term = $request->term;
        $introduce = $request->introduce;

        $privacyPolicy = Policy::find(1);
        if ($privacyPolicy) {
            $privacyPolicy->privacy_policy = $policy;
            $privacyPolicy->term_of_service = $term;
            $privacyPolicy->introduce = $introduce;
            $privacyPolicy->save();
        } else {
            Policy::create([
                'privacy_policy' => $policy,
                'term_of_service' => $term,
                'introduce' => $introduce
            ]);
        }

        return redirect()->route('admin.policy');
    }

    public function contact()
    {
        $contact = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contact', compact('contact'));
    }

    public function order()
    {
        $orders = Orders::orderBy('order_date', 'desc')->get();
        return view('admin.order', compact('orders'));
    }

    public function orderDetail(Request $request)
    {
        $orderId = $request->id;
        $order = Orders::find($orderId);
        $order->send_date = Carbon::createFromTimestamp(strtotime($order->send_date))->format('Y-m-d');
        $orderDetail = OrderDetail::with(['product'])->where('order_id', $orderId)->get();
        $total = 0;
        foreach ($orderDetail as $item) {
            $total += $item->quantity * $item->price;
            $item->product->img = json_decode($item->product->img_path, true)[0];
        }
        return view('admin.order_detail', compact('orderDetail', 'order', 'total'));
    }

    public function changeStatus(Request $request)
    {
        $orderId = $request->id;
        $status = $request->status;

        Orders::where('id', $orderId)->update(['status' => $status]);

        return response()->json(['success' => true], 200);
    }

    public function saveDate(Request $request)
    {
        $orderId = $request->id;
        $sendDate = $request->send_date;
        $code = $request->code;

        Orders::where('id', $orderId)->update(['send_date' => $sendDate, 'code' => $code]);

        return response()->json(['success' => true], 200);
    }

    public function sizeManagement()
    {
        $sizes = Sizes::all();

        return view('admin.size_management', compact('sizes'));
    }

    public function saveNewSize(Request $request)
    {
        $sizeName = $request->size_name;
        Sizes::create(['name' => $sizeName]);

        return redirect()->back();
    }

    public function editSize(Request $request)
    {
        $sizeName = $request->size_name;
        $id = $request->id;
        Sizes::where('id', $id)->update(['name' => $sizeName]);

        return redirect()->back();
    }

    public function deleteSize(Request $request)
    {
        $id = $request->id;
        Sizes::where('id', $id)->delete();

        return redirect()->back();
    }

    public function colorsManagement()
    {
        $colors = Colors::all();

        return view('admin.color_management', compact('colors'));
    }

    public function saveNewColor(Request $request)
    {
        $colorNameVi = $request->color_name_vi;
        $colorNameEn = $request->color_name_en;
        $colorCode = $request->color_code;
        Colors::create(['name_vi' => $colorNameVi, 'name_en' => $colorNameEn, 'code' => $colorCode]);

        return redirect()->back();
    }

    public function editColor(Request $request)
    {
        $colorNameVi = $request->color_name_vi;
        $colorNameEn = $request->color_name_en;
        $colorCode = $request->color_code;
        $id = $request->id;
        Colors::where('id', $id)->update(['name_vi' => $colorNameVi, 'name_en' => $colorNameEn, 'code' => $colorCode]);

        return redirect()->back();
    }

    public function deleteColor(Request $request)
    {
        $id = $request->id;
        Colors::where('id', $id)->delete();

        return redirect()->back();
    }

    public function shippingMethodManagement()
    {
        $shippingMethod = ShippingMethod::orderBy('id', 'DESC')->get();

        return view('admin.shipping_method.shipping_method_management', compact('shippingMethod'));
    }

    public function createShippingMethod()
    {
        return view('admin.shipping_method.create');
    }

    public function saveShippingMethod(Request $request)
    {
        try {
            $shipNameVi = $request->ship_name_vi;
            $shipNameEn = $request->ship_name_en;
            $shipTimeVi = $request->ship_time_vi;
            $shipTimeEn = $request->ship_time_en;
            $shipFeeVi = $request->ship_fee_vi;
            $shipFeeEn = $request->ship_fee_en;
            $id = $request->id;

            $data = [
                'ship_name_vi' => $shipNameVi,
                'ship_name_en' => $shipNameEn,
                'ship_time_vi' => $shipTimeVi,
                'ship_time_en' => $shipTimeEn,
                'ship_fee_vi' => $shipFeeVi,
                'ship_fee_en' => $shipFeeEn,
            ];
            if (!$id) {
                ShippingMethod::create($data);
            } else {
                ShippingMethod::where('id', $id)->update($data);
            }
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect()->back();
        }
        return redirect()->route('admin.shippingMethod');
    }

    public function editShippingMethod(Request $request)
    {
        $id = $request->id;
        $shipping = ShippingMethod::find($id);

        return view('admin.shipping_method.create', compact('shipping'));
    }

    public function deleteShippingMethod(Request $request)
    {
        $id = $request->id;
        ShippingMethod::where('id', $id)->delete();
        return redirect()->back();
    }

    public function discountManagement()
    {
        $discounts = Discount::orderBy('id', 'DESC')->get();
        foreach ($discounts as $discount) {
            $discount->start_time = Carbon::createFromTimestamp(strtotime($discount->start_time))->format('Y-m-d');
            $discount->end_time = Carbon::createFromTimestamp(strtotime($discount->end_time))->format('Y-m-d');
        }

        return view('admin.discount.discount_management', compact('discounts'));
    }

    public function createDiscount()
    {
        $products = DressProduct::all();
        return view('admin.discount.create', compact('products'));
    }

    public function saveDiscount(Request $request)
    {
        try {
            $id = $request->id;
            $nameVi = $request->name_vi;
            $nameEn = $request->name_en;
            $startTime = $request->start_time;
            $endTime = $request->end_time;
            $discount = $request->discount;
            $listProduct = $request->list_product;
            $descriptionVi = $request->description_vi;
            $descriptionEn = $request->description_en;

            $data = [
                'name_vi' => $nameVi,
                'name_en' => $nameEn,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'discount' => $discount,
                'product_list' => json_encode($listProduct),
                'description_vi' => $descriptionVi,
                'description_en' => $descriptionEn,
            ];
            if (!$id) {
                Discount::create($data);
            } else {
                Discount::where('id', $id)->update($data);
            }
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect()->back();
        }

        return redirect()->route('admin.discount');
    }

    public function editDiscount(Request $request)
    {
        $id = $request->id;
        $discount = Discount::find($id);
        $discount->product_list = json_decode($discount->product_list, true);
        $discount->start_time = Carbon::createFromTimestamp(strtotime($discount->start_time))->format('Y-m-d');
        $discount->end_time = Carbon::createFromTimestamp(strtotime($discount->end_time))->format('Y-m-d');
        $products = DressProduct::all();
        return view('admin.discount.create', compact('products', 'discount'));
    }

    public function deleteDiscount(Request $request)
    {
        $id = $request->id;
        Discount::where('id', $id)->delete();
        return redirect()->back();
    }
    public function listVoucher()
    {
        $voucher = Voucher::query()
            ->select('vouchers.id','vouchers.code','vouchers.discount','vouchers.start_time','vouchers.end_time', 'vouchers.status')
            ->addSelect(DB::raw("(SELECT COUNT(voucher_user.voucher_id) FROM voucher_user WHERE voucher_user.voucher_id = vouchers.id ) as total_use"))
            ->leftJoin('voucher_user', function ($join) {
                $join->on('vouchers.id', '=', 'voucher_user.voucher_id');
            })
            ->groupBy('vouchers.id')
            ->groupBy('vouchers.code')
            ->groupBy('vouchers.discount')
            ->groupBy('vouchers.start_time')
            ->groupBy('vouchers.end_time')
            ->groupBy('vouchers.status')
            ->orderBy('vouchers.id', 'desc')
            ->get()
            ->toArray();
        return view('admin.voucher.list_voucher', compact('voucher'));
    }

    public function addVoucher()
    {
           $code = str_random(10);
        return view('admin.voucher.add_voucher',compact('code'));
    }

    public function saveVoucher(Request $request)
    {
        $codeTest = null;
        $code = $request->code;
        $discount = $request->discount;
        $startTime = date('Y-m-d H:i:s', strtotime($request->start_time));
        $endTime = date('Y-m-d 23:59:59', strtotime($request->end_time));
        if(strtotime($endTime) < time()){
            $status = 1;
        }else{
            $status = 0;
        }
        Voucher::query()->create([
           'code' => $code,
           'discount' => $discount,
           'start_time' => $startTime,
           'end_time' => $endTime,
            'status' => $status,
        ]);
        return redirect()->route('admin.listVoucher');
    }

    public function editVoucher(Request $request)
    {
        $id = $request->id;
        $voucher = Voucher::find($id);
        $date = date('Y-m-d', strtotime($voucher->start_time));
        $time = date('H:i', strtotime($voucher->start_time));
        $startTime = $date.'T'.$time;
        return view('admin.voucher.edit_voucher', compact('voucher','startTime'));
    }

    public function updateVoucher(Request $request)
    {
        $id = $request->id;
        $code = $request->code;
        $discount = $request->discount;
        $startTime = date('Y-m-d H:i:s', strtotime($request->start_time));
        $endTime = date('Y-m-d 23:59:59', strtotime($request->end_time));
        if(strtotime($endTime) < time()){
            $status = 1;
        }else{
            $status = 0;
        }
        Voucher::query()->where('id', $id)->update([
            'code' => $code,
            'discount' => $discount,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'status' => $status,
        ]);

        return redirect()->route('admin.listVoucher');
    }

    public function deleteVoucher(Request $request)
    {
        $id = $request->id;
        $listUserVoucher = VoucherUser::query()->where('voucher_id', $id)->get();
        foreach ($listUserVoucher as $value){
            $value->delete();
        }
        Voucher::query()->where('id', $id)->delete();
        return redirect()->route('admin.listVoucher');
    }
}
