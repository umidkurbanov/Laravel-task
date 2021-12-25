<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $categories = Category::all();

        $data = Product::leftJoin('categories', 'products.category_id', "=", 'categories.id')
            ->leftJoin('brands', 'products.brand_id', "=", 'brands.id')
            ->select('products.*', 'categories.title AS cat_title', 'brands.title AS brand')
            ->get();

        return view('products.all', [ 'products' => $data, 'brands' => $brands, 'categories' => $categories ]);
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->title = $request->title;
        $product->slug = Str::of($request->title)->slug('-');

        $product->is_rgb = $request->is_rgb;

        if ($request->is_rgb == "1")
        {
            $red = $request->red;
            $green = $request->green;
            $blue = $request->blue;

            $product->background = "$red,$green,$blue";
        }
        else
        {
            $image = $request->file('file');
            $ext =  $image->getClientOriginalExtension();
            $imageName = Str::of(Str::random(20))->lower() . "." . $ext;
            $image->move(public_path('images/products'), $imageName);
        
            $product->background = $imageName;
        }

        $product->save();
        
        return redirect(route('products'));
    }


    // Edit
    public function edit_view($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.edit', [ 'product' => $product, 'categories' => $categories, 'brands' => $brands ]);
    }
    
    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->title = $request->title;
        $product->slug = Str::of($request->title)->slug('-');
        $product->is_rgb = $request->is_rgb;

        if ($request->is_rgb == "1")
        {
            $red = $request->red;
            $green = $request->green;
            $blue = $request->blue;

            $product->background = "$red,$green,$blue";
        }
        else
        {
            if ($request->hasFile('file'))
            {
                $image = $request->file('file');
                $ext =  $image->getClientOriginalExtension();
                $imageName = Str::of(Str::random(20))->lower() . "." . $ext;
                $image->move(public_path('images/products'), $imageName);
            
                $product->background = $imageName;
            }
        }
        $product->save();

        return redirect()->back();
    }


    // Delete
    public function delete_view($id)
    {
        $product = Product::find($id);
        return view('products.delete', [ 'product' => $product ]);
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        return redirect(route('products'));
    }
}
