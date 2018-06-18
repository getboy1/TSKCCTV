<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      return view('admin.add_slider');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_slider(Request $request)
    {
      $data=array();
        $data['slider_name']=$request->slider_name;
        $data['publication_status']=$request->publication_status;
        $image=$request->file('slider_image');
      if($image){
        $image_name=str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='slider/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if($success){
          $data['slider_image']=$image_url;
          DB::table('tbl_slider')->insert($data);
          Session::put('message','Slider added successfully !!');
          return Redirect::to('/add-slider');
        }
      }
      $data['slider_image']='';
      DB::table('tbl_slider')->insert($data);
      Session::put('message','Slider added successfully without image !!');
      return Redirect::to('/add-slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function all_slider()
     {
       $all_slider=DB::table('tbl_slider')->get();
       $manage_slider=view('admin.all_slider')
               ->with('all_slider',$all_slider);
       return view('admin_layout')
               ->with('admin.all_slider',$manage_slider);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function unactive_slider($slider_id)
     {
         DB::table('tbl_slider')
           ->where('slider_id',$slider_id)
           ->update(['publication_status'=> 0 ]);
           Session::put('message','slider Unactive successfully !!');
           return Redirect::to('/all-slider');
     }

     public function active_slider($slider_id)
     {
         DB::table('tbl_slider')
           ->where('slider_id',$slider_id)
           ->update(['publication_status'=> 1 ]);
           Session::put('message','slider Activated successfully !!');
           return Redirect::to('/all-slider');
     }

    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
