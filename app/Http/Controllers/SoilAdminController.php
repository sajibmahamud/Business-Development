<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class SoilAdminController extends Controller
{
	public function index(){
		return view('soil_admin.soil_admin_login');
	}

	public function soil_login(Request $request){

		$soil_admin_email = $request->soil_admin_email;
		$soil_admin_pass = md5($request->soil_admin_pass);

		$result = DB::table('soil_admin')
		->where('soil_admin_email', $soil_admin_email)
		->where('soil_admin_pass', $soil_admin_pass)
		->first();
		

		if ($result) {
			session::put('soil_admin_name', $result->soil_admin_name);
			session::put('soil_id', $result->soil_id);
			return Redirect::to('/all-soil-review');
		}else{
			session::put('message', 'Email or Password Invalid!!');
			return Redirect::to('/soil_admin');
		}
	}

	public function soil_dashboard(){
		$this->soilAuthCheck();
		return view('soil_admin.dashboard');
	}

	public function soil_logout(){
		Session::flush();
		return Redirect::to('/soil_admin');
	}


	//show all order....................
	public function all_order(){

		$this->soilAuthCheck();
		$all_order_info = DB::table('tbl_orders')
		->join('file_review','tbl_orders.o_id','=','file_review.o_id')
		->select('tbl_orders.*', 'file_review.*')
		->where('file_review.f_soil', 'soil')
		->get();

		$manage = view('soil_admin.all_order')->with('all_order_info', $all_order_info);
		return view('soil_admin.soil_admin_layout')->with('soil_admin.all_order', $manage);
	}

	//show all order....................
	Public function confirm($o_id){
		$this->soilAuthCheck();
		return view('soil_admin.confirm_order');
	}

	//show all order....................
	public function manage(){

		$this->soilAuthCheck();
		$all_order_info = DB::table('tbl_orders')
		->join('file_review','tbl_orders.o_id','=','file_review.o_id')
		->join('tbl_confirm','tbl_orders.o_id','=','tbl_confirm.o_id')
		->select('tbl_orders.*', 'file_review.*', 'tbl_confirm.*')
		->where('tbl_confirm.c_soil', 'soil')
		->get();

		$manage = view('soil_admin.manage')->with('all_order_info', $all_order_info);
		return view('soil_admin.soil_admin_layout')->with('soil_admin.manage', $manage);
	}

	public function confirm_message(Request $request){

		$c_id = Session::get('c_id');
		$data = array();
		$data['c_id'] = $c_id;
		$data['c_message'] = $request->c_message;
		$data['o_id'] = $request->o_id;
		$data['c_soil'] = $request->c_soil;

		$confirm_id = DB::table('tbl_confirm')->insert($data);
		Session::put('confirm_id', $confirm_id);
		session::put('message', 'Review send!!');
		return Redirect::to('/soil-confirm-order/{o_id}');
	}

	public function soilAuthCheck(){
		$soil_id = Session::get('soil_id');
		if ($soil_id) {
			return;
		}else{
			return Redirect::to('/soil_admin')->send();
		}	

	}
}
