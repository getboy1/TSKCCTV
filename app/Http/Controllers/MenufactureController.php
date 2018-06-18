<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();
class MenufactureController extends Controller
{

    public function index()
    {
      $this->AdminAuthCheck();
      return view('admin.add_menufacture');
    }

    public function save_menufacture(Request $request)
    {
        $data=array();
        $data['menufacture_id']=$request->menufacture_id;
        $data['menufacture_name']=$request->menufacture_name;
        $data['menufacture_description']=$request->menufacture_description;
          $data['publication_status']=$request->publication_status;

        DB::table('tbl_menufacture')->insert($data);
        Session::put('message','Menufacture added successfully !!');
        return Redirect::to('/add-menufacture');
      }

      public function all_menufacture()
      {
        $this->AdminAuthCheck();
        $all_menufacture_info=DB::table('tbl_menufacture')->get();
        $manage_menufacture=view('admin.all_menufacture')
                ->with('all_menufacture_info',$all_menufacture_info);
        return view('admin_layout')
                ->with('admin.all_menufacture',$manage_menufacture);

          //return view('admin.all_menufacture');
      }

      public function delete_menufacture($menufacture_id)
      {
        DB::table('tbl_menufacture')
          ->where('menufacture_id',$menufacture_id)
          ->delete();
        Session::get('message','menufacture Delete successfully !');
          return Redirect::to('/all-menufacture');
      }

      public function unactive_menufacture($menufacture_id)
      {
          DB::table('tbl_menufacture')
            ->where('menufacture_id',$menufacture_id)
            ->update(['publication_status'=> 0 ]);
            Session::put('message','menufacture Unactive successfully !!');
            return Redirect::to('/all-menufacture');
      }

      public function active_menufacture($menufacture_id)
      {
          DB::table('tbl_menufacture')
            ->where('menufacture_id',$menufacture_id)
            ->update(['publication_status'=> 1 ]);
            Session::put('message','menufacture Activated successfully !!');
            return Redirect::to('/all-menufacture');
      }

      public function edit_menufacture($menufacture_id)
      {
        $this->AdminAuthCheck();
        $menufacture_info=DB::table('tbl_menufacture')
            ->where('menufacture_id',$menufacture_id)
            ->first();
        $menufacture_info=view('admin.edit_menufacture')
            ->with('menufacture_info',$menufacture_info);
        return view('admin_layout')
            ->with('admin.edit_menufacture',$menufacture_info);

        //return view('admin.edit_menufacture');
      }

        public function update_menufacture(Request $request,$menufacture_id )
        {
          $data=array();
          $data['menufacture_name']=$request->menufacture_name;
          $data['menufacture_description']=$request->menufacture_description;

          DB::table('tbl_menufacture')
            ->where('menufacture_id',$menufacture_id)
            ->update($data);

            Session::get('message','menufacture update successfully !');
            return Redirect::to('/all-menufacture');
        }

        public function AdminAuthCheck()
        {
          $admin_id=Session::get('admin_id');

          if($admin_id){
              return;
          }else {
            return Redirect::to('/admin')->send();
          }
        }
}
