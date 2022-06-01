<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::count('id');
        $categories = Category::where('parent_category_id', '!=', null)->count('id');
        $orders = Order::count('id');
        $users = User::count('id');
        return view('admin.index', compact('products', 'categories', 'orders', 'users'));
    }
}
