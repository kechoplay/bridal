<?php

namespace App\Http\Controllers;

use App\Address;
use App\Colors;
use App\Contact;
use App\Customers;
use App\Feedback;
use App\Mail\MailOrder;
use App\News;
use App\OrderDetail;
use App\Orders;
use App\Policy;
use App\Sizes;
use App\SlideImage;
use App\WeddingDressCategory;
use App\DressProduct;
use App\StyleDress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\New_;


class UserController extends Controller
{
    public function userLogin()
    {
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        return view('user.login', compact('styles', 'isStyle'));
    }

    public function userRegister()
    {
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        return view('user.register', compact('styles', 'isStyle'));
    }

    public function registerSave(Request $request)
    {
        $checkMail = Customers::query()->where('email', $request->email_user)->first();
        if ($checkMail) {
            return redirect()->route('userRegister')->with('error', 'Error! Email already exists.');
        } else {
            Customers::query()->create([
                'name' => $request->name_user,
                'email' => $request->email_user,
                'password' => Hash::make($request->pass_user),
            ]);
        }
        return redirect()->route('userLogin')->with('success', 'Success! please login.');
    }

    public function checkLogin(Request $request)
    {
        if ($request->isMethod('POST')) {
            //Xu li login
            $account = $request['email_user'];
            $password = $request['pass_user'];
            if ((Auth::guard('customers')->attempt(['email' => $account, 'password' => ($password)]))) {
                return redirect()->route('homeIndex');
            }
            return redirect()->route('userLogin')
                ->with('error', 'email or password is incorrect!');
        }
    }

    public function userDetail()
    {
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        $customer_id = Auth::guard('customers')->user()->id;
        $address = Address::query()->where('customer_id', $customer_id)->first();
        return view('user.detail', compact('styles', 'isStyle', 'address'));
    }

    public function userLogout()
    {
        Auth::guard('customers')->logout();
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        return redirect()->route('userLogin');
    }

    public function userAddress()
    {
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        $customer_id = Auth::guard('customers')->user()->id;
        $address = Address::query()->where('customer_id', $customer_id)->first();
        return view('user.address', compact('styles', 'isStyle', 'address'));
    }

    public function addressStore(Request $request)
    {
        Address::query()->create([
            'customer_id' => Auth::guard('customers')->user()->id,
            'name' => $request->name_order,
            'phone' => $request->phone_order,
            'email' => $request->email_order,
            'address' => $request->address_order,
        ]);
        return redirect()->route('userDetail')->with('success', 'add address success!');
    }

    public function addressSave($id, Request $request)
    {
        Address::query()->where('id', $id)->update([
            'name' => $request->name_order,
            'phone' => $request->phone_order,
            'email' => $request->email_order,
            'address' => $request->address_order,
        ]);
        return redirect()->route('userDetail')->with('success', 'save address success!');
    }

    public function addressDestroy(Request $request)
    {
        $id = $request->id;
        Address::query()->where('id', $id)->delete();
        return response()->json(['success' => true, 'msg' => 'Delete success!'], 200);
    }

    public function history(Request $request)
    {
        $customer_id = Auth::guard('customers')->user()->id;
        $products = DB::table('orders')
            ->where('customer_id', $customer_id)
            ->join('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->join('dress_product', 'order_detail.product_id', '=', 'dress_product.id')
            ->select()
            ->get();
        foreach ($products as $product) {
            $product->image = json_decode($product->img_path, true)[0];
        }
        return view('user.history', compact('products'));
    }

    public function orderView(Request $request)
    {
        $product_id = $request->id;
        $product = DressProduct::query()->where('id', $product_id)->first();
        $product->image = json_decode($product->img_path, true)[0];
        return view('user.order', compact('product'));
    }

    public function sendFeedback(Request $request)
    {
        $imageList = [];
        $images = $request->images;
        $customer_id = Auth::guard('customers')->user()->id;
        $path = public_path('image');
        if (!File::exists($path))
            File::makeDirectory($path, 0777, true);
        foreach ($images as $key => $image) {
            $name = $key . time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $name);
            $imageList[] = '/image/' . $name;
        }
        $data = [
            'product_id' => $request->id,
            'user_id' => $customer_id,
            'content' => $request->msg_content,
            'list_image' => json_encode($imageList)
        ];
        Feedback::create($data);
        return back();
    }

    public function viewNew()
    {
        $news = News::all();
        return view('news.news', compact('news'));
    }

    public function viewCreateNew()
    {
        $styles = WeddingDressCategory::all();
        $colors = Colors::all();
        $sizes = Sizes::all();
        return view('news.create_new', compact('styles', 'colors', 'sizes'));
    }

    public function saveNew(Request $request)
    {
        $image = $request->image;
        $path = public_path('image');
        $customer_id = Auth::guard('customers')->user()->id;
        if (!File::exists($path))
            File::makeDirectory($path, 0777, true);
        $name = $customer_id . time() . '.' . $image->getClientOriginalExtension();
        $image->move($path, $name);
        $url = '/image/' . $name;
        $data = [
            'title_vi' => $request->title_vi,
            'title_en' => $request->title_en,
            'description_vi' => $request->description_vi,
            'description_en' => $request->description_en,
            'img_path' => $url
        ];
        News::create($data);
        return back();
    }


}
