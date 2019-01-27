<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class AdminController extends Controller
{
    public function index(){
		return view('admin_login');
	}

	public function dashboard(Request $request){

		$admin_email = $request->admin_email;
		$admin_password = md5($request->admin_password);

		$result = DB::table('tbl_admin')
		->where('admin_email', $admin_email)
		->where('admin_pass', $admin_password)
		->first();

		if ($result) {
			session::put('admin_name', $result->admin_name);
			session::put('admin_id', $result->admin_id);
                        // Session::flush();
			return Redirect::to('/all-order');
		}else{
			session::put('message', 'Email or Password Invalid!!');
			return Redirect::to('/admin_backend');
		}
	}

	//show all order....................
	public function manage(){

		$all_order_info = DB::table('tbl_orders')
		->join('file_review','tbl_orders.o_id','=','file_review.o_id')
		->join('tbl_confirm','tbl_orders.o_id','=','tbl_confirm.o_id')
		->select('tbl_orders.*', 'file_review.*', 'tbl_confirm.*')
		->get();

		$manage = view('back.manage')->with('all_order_info', $all_order_info);
		return view('admin_layout')->with('back.manage', $manage);
	}
}
