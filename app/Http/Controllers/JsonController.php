<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use DB;

class JsonController extends Controller
{
    // Function to send JSON data to the view
    public function load_ajax(Request $request)
    {
        if($request->ajax())
        {
            $data = Category::with(['brands', 'products'])->get();
            return response()->json([
                'data' => $data
            ]);
        }
    }
}
