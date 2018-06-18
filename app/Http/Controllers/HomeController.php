<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class HomeController extends Controller
{
  public function index()
  {
    $all_published_product=DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_menufacture','tbl_products.menufacture_id','=','tbl_menufacture.menufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_menufacture.menufacture_name')
            ->where('tbl_products.publication_status',1)
            ->limit(9)
            ->get();

    $manage_published_product=view('pages.home_content')
            ->with('all_published_product',$all_published_product);
    return view('layout')
            ->with('page.home_content',$manage_published_product);
       return view('pages.home_content');
  }

  public function show_product_by_category($category_id)
  {
    $product_by_category=DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->select('tbl_products.*','tbl_category.category_name')
            ->where('tbl_category.category_id',$category_id)
            ->where('tbl_products.publication_status',1)
            ->limit(18)
            ->get();

    $manage_product_by_category=view('pages.category_by_products')
            ->with('product_by_category',$product_by_category);
    return view('layout')
            ->with('page.category_by_products',$manage_product_by_category);
  }

  public function show_product_by_menufacture($menufacture_id)
  {
    $product_by_menufacture=DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_menufacture','tbl_products.menufacture_id','=','tbl_menufacture.menufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_menufacture.menufacture_name')
            ->where('tbl_menufacture.menufacture_id',$menufacture_id)
            ->where('tbl_products.publication_status',1)
            ->limit(18)
            ->get();

    $manage_product_by_menufacture=view('pages.menufacture_by_products')
            ->with('product_by_menufacture',$product_by_menufacture);
    return view('layout')
            ->with('page.menufacture_by_products',$manage_product_by_menufacture);
  }

  public function product_details_by_id($product_id)
  {
    $product_by_details=DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_menufacture','tbl_products.menufacture_id','=','tbl_menufacture.menufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_menufacture.menufacture_name')
            ->where('tbl_products.product_id',$product_id)
            ->where('tbl_products.publication_status',1)
            ->first();
    $manage_product_by_details=view('pages.product_details')
            ->with('product_by_details',$product_by_details);
    return view('layout')
            ->with('page.product_details',$manage_product_by_details);

  }
}
