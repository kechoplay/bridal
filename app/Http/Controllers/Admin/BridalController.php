<?php

namespace App\Http\Controllers\Admin;

use App\DressProduct;
use App\StyleDress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BridalController extends Controller
{
    //
    public function index(Request $request)
    {
        $dress = DressProduct::all();
        foreach ($dress as $dr) {
            $dr->image = json_decode($dr->img_path, true)[0];
        }
        return view('admin.bridal.index', compact('dress'));
    }

    public function create(Request $request)
    {
        $styles = StyleDress::all();
        return view('admin.bridal.add', compact('styles'));
    }

    public function store(Request $request)
    {
        $nameDress = $request->name;
        $images = $request->images;
        $description = $request->description;
        $style = $request->style;
        $status = $request->status;

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
            'name' => $nameDress,
            'img_path' => json_encode($imageList),
            'description' => $description,
            'style' => $style,
            'status' => $status
        ]);

        return redirect()->route('admin.index');
    }

    public function listStyle()
    {
        $styles = StyleDress::all();
        return view('admin.style.list_style', compact('styles'));
    }

    public function addStyle()
    {
        return view('admin.style.add_style');
    }

    public function saveStyle(Request $request)
    {
        $name = $request->name;
        StyleDress::create([
            'name' => $name,
            'slug' => Str::slug($name)
        ]);
        return redirect()->route('admin.listStyle');
    }
}
