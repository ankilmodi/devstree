<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Session\TokenMismatchException;
use DataTables;
use DB;

class ReportController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('report.report_product_count');
    }

      /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reportProductCountDatatable(Request $request)
    {
         
        if ($request->ajax()) {
      
        $data = DB::table('products')
                ->leftJoin('categoryes', 'products.category_id', '=', 'categoryes.id')
                ->select('categoryes.category_name','products.category_id', DB::raw('count(*) as total'))
                ->groupBy('products.category_id')
                ->get();
    
         return Datatables::of($data)
                ->addIndexColumn()
                 ->editColumn('total', function($row){
                    $btn = '<a href="'.url('/product-list?category_id='.$row->category_id) .'" class="btn btn-primary btn-flat">'.$row->total.'</a>';
                    return $btn;
                })
                ->rawColumns(['total'])
                ->make(true);
          }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMaxPrice()
    {   
        return view('report.report_product_max_price');
    }

      /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reportProductMaxPriceDatatable(Request $request)
    {
         
         if ($request->ajax()) {
      
        $data = Product::select(['id','category_id','product_name','price'])
        ->orderBy('price', 'DESC')
        ->where('is_deleted','=','0')->with('Category')->newQuery();
    
         return Datatables::of($data)
                ->addIndexColumn()
                 ->editColumn('category_id', function($row){
                    $category_id = $row->Category[0]->category_name;
                    return $category_id;
                })
                ->addColumn('action', function($row){
                     $btn = '<a href="' . route('productEdit', $row->id) .'" class="btn btn-primary btn-flat">EDIT</a>
                     <a href="' . route('productDelete', $row->id) .'" class="btn btn-danger btn-flat">DELETE</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
          }
    }

   
}