<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use DB;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $categories = Category::all();

        $data = Brand::leftJoin('categories', 'brands.category_id', "=", 'categories.id')
            ->select('brands.id', 'brands.title', 'brands.slug', 'categories.title AS cat_title')
            ->get();

        return view('brands.all', [ 'brands' => $data, 'categories' => $categories ]);
    }

    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->category_id = $request->category_id;
        $brand->title = $request->title;
        $brand->slug = Str::of($request->title)->slug('-');
        $brand->save();

        return redirect(route('brands'));
    }


    // Edit
    public function edit_view($id)
    {
        $brand = Brand::find($id);
        $categories = Category::all();
        return view('brands.edit', [ 'brand' => $brand, 'categories' => $categories ]);
    }
    
    public function edit(Request $request, $id)
    {
        $brand = Brand::find($id);
        $brand->category_id = $request->category_id;
        $brand->title = $request->title;
        $brand->slug = Str::of($request->title)->slug('-');
        $brand->save();

        return redirect()->back();
    }


    // Delete
    public function delete_view($id)
    {
        $brand = Brand::find($id);
        return view('brands.delete', [ 'brand' => $brand ]);
    }

    public function delete($id)
    {
        Brand::find($id)->delete();
        return redirect(route('brands'));
    }
}
