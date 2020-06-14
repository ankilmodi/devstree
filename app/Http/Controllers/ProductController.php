<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Session\TokenMismatchException;
use DataTables;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $product = Product::with('Category')->latest()->paginate(10);
            return view('product.view_product_list',compact('product'))
                ->with('i', (request()->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $category = Category::where('parent_id','=','0')->pluck('category_name','id')->toArray();
         return view('product.add_product', compact('category')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
         
         $this->validate($request, array(
            'category_id' => 'required',
            'product_name' => 'required',
            'product_image' => 'required|max:5270',
            'product_description' => 'required',
            'price' => 'required|numeric',
        ));

       
        $imageName = time().'.'.request()->product_image->getClientOriginalExtension();
        request()->product_image->move(public_path('product_image'), $imageName);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->product_image = $imageName;
        $product->product_description = $request->product_description;
        $product->price = $request->price;
        $product->save();

         return redirect('/product-list')->with('message', 'Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('parent_id','=','0')->pluck('category_name','id')->toArray();   
        $product_get = Product::where('id', $id)->first();
        return view('product.edit_product', compact('product_get','category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, array(
            'category_id' => 'required',
            'product_name' => 'required',
            'product_image' => 'max:5270',
            'product_description' => 'required',
            'price' => 'required|numeric'
        ));

         $data = $request->all();

        if(!empty($data['product_image'])){
            $imageName = time().'.'.request()->product_image->getClientOriginalExtension();
        request()->product_image->move(public_path('product_image'), $imageName);
        }else{
            $imageName = $data['old_image'];
        }

        $product = Product::where('id',$id)->first();
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->product_image = $imageName;
        $product->product_description = $request->product_description;
        $product->price = $request->price;
        $product->save();

        return redirect('product-list')->with('message', 'Successfully Product Updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        Product::find($id)->delete();
        return redirect('product-list')->with('message', 'Successfully Product Delete!');
    }

    
}