<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_Image;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->simplePaginate(5);
        return view('admin.view-product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_category_id', '=', NULL)->get();
        return view('admin.add_product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $product = Product::create([
            'user_role_id' => '1',
            'title' => $request['product_title'],
            'description' => $request['product_description'],
            'price' => $request['product_price'],
            'quantity' => $request['product_quantity'],
            'low_inventory' => $request['product_inventory'],
            'is_featured' => $request['product_featured'],
            'is_free_shipping' => $request['product_free_shipping'],
            'shipping_charges' => $request['product_shippingcharges'],
            'category_id' => $request['sub_category'],
            'is_comment_allowed' => $request['product_is_comments'],
            'is_rating_allowed' => $request['product_is_rating'],
            'weight' => $request['product_weight'],

        ]);

        $getlastid = $product->id;
        $is_main_uploaded = false;
		$ismain = 0;
        
        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $image)
            {
                if ($is_main_uploaded == true) {
                    $ismain = 0;
                }
                else{
                    $ismain = 1;
                    $is_main_uploaded = true;
                }

                $name=$image->getClientOriginalName();
                $image->move(public_path().'/img/', $name);  
                $data[] = $name;  
                $a = DB::table('product_images')->insert(['product_id' => $getlastid, 'image_path' => $name, 'is_main_image' => $ismain]);
            }    
        }
        
        return redirect()->back()->with('success', 'Successfully product added '.$product->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $product_image = DB::table('product_images')->where('product_id', $id)->first();
        return view('admin.edit-product', compact('products', 'product_image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->title = $request->product_title;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->quantity = $request->product_quantity;
        $product->low_inventory = $request->product_inventory;
        $product->is_featured = $request->product_featured;
        $product->is_free_shipping = $request->product_free_shipping;
        $product->shipping_charges = $request->product_shippingcharges;
        $product->is_rating_allowed = $request->product_is_rating;
        $product->is_comment_allowed = $request->product_is_comments;
        $product->weight = $request->product_weight;
        $product->save();

        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/img/', $name);  
                $data[] = $name;  
                $a = DB::table('product_images')->where('product_id', $product->id)->update(['image_path' => $name]);
            }    
        }

        return redirect()->route('view-product')->with('success', 'Successfully updated product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $products = Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Successfully product deleted');
        // return response()->json('success', 'Successfully product deleted');
    }
}
