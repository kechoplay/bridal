<?php

namespace App\Http\Controllers\Admin;

use App\DressProduct;
use App\StyleDress;
use App\WeddingDressCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
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
        $styles = WeddingDressCategory::all();
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
            'status' => $status,
            'category_id' => $style,
            'slug' => Str::slug($nameDress)
        ]);

        return redirect()->route('admin.index');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $dress = DressProduct::find($id);
        $styles = WeddingDressCategory::all();
        $dress->img_path = json_decode($dress->img_path, true);

        return view('admin.bridal.edit', compact('dress', 'styles'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $nameDress = $request->name;
        $images = $request->images;
        $description = $request->description;
        $style = $request->style;
        $status = $request->status;

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
            'img_path' => json_encode($imageList),
            'description' => $description,
            'category_id' => $style,
            'status' => $status,
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

    }
}
