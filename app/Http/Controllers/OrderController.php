<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Session;
session_start();

class OrderController extends Controller
{
	public function index(){
		$this->frontAuthCheck();
		return view('front.order');
	}

	public function save_order(Request $request){
		$c_id = Session::get('c_id');
		$data = array();
		$data['c_id'] = $c_id;
		$data['o_country'] = $request->o_country;
		$data['o_b_name'] = $request->o_b_name;
		$data['o_description'] = $request->o_description;
		$data['o_email'] = $request->o_email;
		$data['o_phone'] = $request->o_phone;
		$data['soil'] = $request->soil;
		$data['gass'] = $request->gass;
		$data['land'] = $request->land;
		$data['water'] = $request->water;
		$data['tax'] = $request->tax;
		$data['status'] = 'pending';

		$image = $request->file('o_file');
		if ($image) {
			$image_name = str_random(20);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name.'.'.$ext;
			$upload_path = 'order_file/';
			$image_url = $upload_path.$image_full_name;
			$success = $image->move($upload_path, $image_full_name);

			if ($success) {
				$data['o_file'] = $image_url;

				$o_id = DB::table('tbl_orders')->insert($data);
				Session::put('o_id', $o_id);
				session::put('message', 'Order Successfully!!');
				return Redirect::to('/services');
			}
		}

		$o_id = DB::table('tbl_orders')->insert($data);
		Session::put('o_id', $o_id);
		session::put('message', 'Order Successfully!!');
		return Redirect::to('/services');
	}

	//show all order....................
	public function all_order(){
		$this->adminAuthCheck();
		$all_order_info = DB::table('tbl_orders')
		->join('tbl_customers','tbl_orders.c_id','=','tbl_customers.c_id')
		->select('tbl_orders.*', 'tbl_orders.c_id')
		->get();
		$manage = view('back.all_order')->with('all_order_info', $all_order_info);
		return view('admin_layout')->with('back.all_order', $manage);
	}

	// public function download_pdf(){
	// 	$download = DB::table('tbl_orders')->get();
	// 	return view('back.all_order', compact('download'));
	// }

	Public function review_order($o_id){
		$this->adminAuthCheck();
		return view('back.review_order', ['o_id' => $o_id]);
	}
	
	//.............................................................
	public function frontAuthCheck(){
		$c_id = Session::get('c_id');
		if ($c_id) {
			return;
		}else{
			return Redirect::to('/login')->send();
		}	
	}

	//.............................................................
	public function adminAuthCheck(){
		$admin_id = Session::get('admin_id');
		if ($admin_id) {
			return;
		}else{
			return Redirect::to('/login')->send();
		}	
	}

}
