<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\transaction;
use App\Models\Category;
use Illuminate\Support\Str;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.all', [ 'categories' => $categories ]);
    }
    
    public function view($id)
    {
        $client = Client::find($id);

        $data = Client::leftJoin('orders', 'clients.id', "=", 'orders.client_id')
            ->leftJoin('transactions', 'orders.id', "=", 'transactions.order_id')
            ->select('clients.id', 'orders.date AS order_date', 'transactions.total AS total',  
                'orders.date AS order_date', 'clients.name', 'clients.surname')
            ->where('clients.id', '=', $id)
            ->where('transactions.total', '<>', 'null')
            ->get();

        return view('clients.view', [ 'client' => $client, 'data' => $data ]);
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->title = $request->title;
        $category->slug = Str::of($request->title)->slug('-');
        $category->save();

        return redirect(route('categories'));
    }


    // Edit
    public function edit_view($id)
    {
        $category = Category::find($id);
        return view('categories.edit', [ 'category' => $category ]);
    }

    public function edit(Request $request, $id)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->slug = Str::of($request->title)->slug('-');
        $category->save();

        return redirect()->back();
    }


    // Delete
    public function delete_view($id)
    {
        $category = Category::find($id);
        return view('categories.delete', [ 'category' => $category ]);
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect(route('categories'));
    }
}