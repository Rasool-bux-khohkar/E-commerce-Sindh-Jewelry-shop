<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
// use Illuminate\Support\Facades\DB;
use App\Models\Gold_rate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view_categories = Category::orderBy('id', 'desc')->simplePaginate(5);
        // foreach ($view_categories as $category)
        // {  
        //     // print_r($category['id']);
        //     if($category->parent_category_id == null )
        //     {
        //        echo $category['category'];

        //     } 
        // }
        return view('admin.view-category', compact('view_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('admin.add-category');
        
        // $gold_rate = ($request->category/11.665);
        // // dd($result);
        // $rate = Gold_rate::find(1);
        // $rate->rate = $request->category;
        // $rate->save();
        // // $result = 0;
        // $products = Product::all();
        // foreach($products as $product)
        // {
        //     if($product->gold_rate_id == 1)
        //     {
        //         $result = (int)((float)$gold_rate * (float)$product->weight);
        //         var_dump($result);
        //         // echo $result;
        //         // echo ((int)$result * (int)$product->weight);
        //         // $product->price = $result;
                
        //         // $p = Product::where('gold_rate_id', 1)->update(['price'=> $result]);
        //         // dd($p);
        //     }
        //     // return $p;
        // }
        // // $p->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'category' => $request['category'],
        ]);

        // return redirect()->back()->with('success', "Category Successfully Added is ".$category->category);
        return redirect('add-subcategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $view_categories = Category::orderBy('id', 'desc')->simplePaginate(5);
        // // dd($view_categories);
        // return view('admin.view-category', compact('view_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id); 
        return view('admin.edit-category', compact('categories'));
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
        // dd($request->update_category);
        $category = Category::find($id);
        $category->category = $request->update_category;
        $category->save();
        // dd($category);
        return redirect()->route('view-category')->with('success', 'Successfully updated category');
        // return response()->json(['success'=>'Status change successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        return redirect()->back()->with('success', 'Successfully deleted category');
    }
}
