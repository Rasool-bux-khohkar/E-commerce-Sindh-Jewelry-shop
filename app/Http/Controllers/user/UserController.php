<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('UserMiddleware');
    // }

    public function home()
    {
      //$a = app('App\Http\Controllers\CategoriesController')->index();
        $products = DB::table('products')
        ->join('product_images','products.id', '=', 'product_images.product_id')
        ->orderBy('products.id', 'asc')->take(5)->where('product_images.is_main_image', 1)->get();
        
        $product_images = DB::table('product_images')->where('is_main_image', 0)->get();
        
        $categories = (new CategoriesController)->index();
        $subcategory = Category::where('parent_category_id', '!=', Null)->get();
        
        $trend_products = Product::join('categories', 'categories.id', '=', 'products.category_id')
        ->join('product_images', 'products.id', '=', 'product_images.product_id')
        ->where('categories.parent_category_id', 1)
        ->where('product_images.is_main_image' , 1)
        ->orderBy('products.id', 'desc')->limit(3)->get();

        return view('user.index', compact('products', 'product_images', 'categories', 'subcategory', 'trend_products'));
    }

    public function products(Request $request)
    {
        $category_id = $request->input('category_id');
        $categories = (new CategoriesController)->index();
        $subcategory = Category::where('parent_category_id', '!=', Null)->get();
        $products = (new ProductController)->index();
        $product_images = DB::table('product_images')->where('is_main_image', 0)->get();
        // dd($products->['image_path']);
        // $products = app('App\Http\Controllers\admin\ProductController')->index();
        return view('user.products', compact('products', 'product_images', 'categories', 'subcategory', 'category_id'));
    }

    public function product_detail(Request $request)
    {
        $categories = (new CategoriesController)->index();
        $subcategory = Category::where('parent_category_id', '!=', Null)->get();
        // $product = DB::table('products')->where('products.id', $request['product_id'] )->get();
        $product = DB::table('products')
        ->join('product_images','product_images.product_id', '=', 'products.id')
        ->where('product_images.is_main_image', 1)
        ->where('products.id', $request['product_id'])
        ->get();
        $product_images = DB::table('product_images')
        ->where('product_images.product_id', $request['product_id'] )
        ->where('product_images.is_main_image', 0)
        ->get();

        return view('user.product-detail', compact('product', 'product_images' , 'categories', 'subcategory'));
    }

    public function cart()
    {
        $categories = (new CategoriesController)->index();
        $subcategory = Category::where('parent_category_id', '!=', Null)->get();
        return view('user.cart', compact('categories', 'subcategory'));
    }

    public function addToCart($id)
    {
        // session()->flush();
        // dd(session('cart'));
        // $product = Product::findOrFail($id);
        $products = DB::table('products')
        ->join('product_images', 'products.id', '=', 'product_images.product_id')
        ->where('products.id', $id)->get();
        
        foreach ($products as $product)
        {
            // dd($product->shipping_charges);
        }

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image_path,
                'shipping_charges' => $product->shipping_charges,
            ];
        }
        session()->put('cart', $cart);
        // return response()->json(['success', 'Product added successfully in cart ']);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout()
    {
        $categories = (new CategoriesController)->index();
        $subcategory = Category::where('parent_category_id', '!=', Null)->get();
        return view('user.checkout', compact('categories', 'subcategory'));
    }
}
