<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Session\TokenMismatchException;
use DataTables;

class SubCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $category = Category::latest()->paginate(10);
            return view('subcategory.view_category_list',compact('category'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $category = Category::where('parent_id','0')->pluck('category_name','id')->toArray();
         return view('subcategory.add_category',compact('category')); 
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
            'cat_title' => 'required',
            'pdf_uplode' => 'required|mimes:pdf|max:10000',
            'status' => 'required',
        ));


        $pdfCatName = time().'.'.request()->pdf_uplode->getClientOriginalExtension();
        request()->pdf_uplode->move(public_path('pdf_uplode'), $pdfCatName);

        $category = new Category();
        $category->parent_id = $request->parent_id;
        $category->category_name = $request->cat_title;
        $category->pdf_uplode = $pdfCatName;
        $category->status = $request->status;
        $category->save();

         return redirect('/sub-category-list')->with('message', 'Category Added Successfully!');
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
        $category_get = Category::where('id', $id)->first();
        $category = Category::where('parent_id','0')->pluck('category_name','id')->toArray();
        return view('subcategory.edit_category', compact('category_get','category'));

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
            'cat_title' => 'required',
            'status' => 'required',
        ));

        if(!empty($request->pdf_uplode)){
            $pdfCatName = time().'.'.request()->pdf_uplode->getClientOriginalExtension();
            request()->pdf_uplode->move(public_path('pdf_uplode'), $pdfCatName);
        }else{

            $pdfCatName = $request->oldpdf_uplode;
        }

            $category = Category::where('id',$id)->first();
            $category->parent_id = $request->parent_id;
            $category->category_name = $request->cat_title;
            $category->pdf_uplode = $pdfCatName;
            $category->status = $request->status;
            $category->save();

            return redirect('sub-category-list')->with('message', 'Successfully Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    

        Category::find($id)->delete();
        return redirect('sub-category-list')->with('message', 'Successfully Category Delete!');
    }

  

   
}