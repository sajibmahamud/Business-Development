<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class LandAdminController extends Controller
{
    public function index(){
		return view('land_admin.land_admin_login');
	}

	public function land_login(Request $request){

		$land_admin_email = $request->land_admin_email;
		$land_admin_pass = md5($request->land_admin_pass);

		$result = DB::table('land_admin')
		->where('land_admin_email', $land_admin_email)
		->where('land_admin_pass', $land_admin_pass)
		->first();

		if ($result) {
			session::put('land_admin_name', $result->land_admin_name);
			session::put('land_id', $result->land_id);
			return Redirect::to('/all-land-review');
		}else{
			session::put('message', 'Email or Password Invalid!!');
			return Redirect::to('/land-admin');
		}
	}

	public function land_dashboard(){
		$this->landAuthCheck();
		return view('land_admin.dashboard');
	}

	public function land_logout(){
		Session::flush();
		return Redirect::to('/land-admin');
	}

	//show all order....................
	public function all_order(){

		$this->landAuthCheck();
		$all_order_info = DB::table('tbl_orders')
		->join('file_review','tbl_orders.o_id','=','file_review.o_id')
		->select('tbl_orders.*', 'file_review.*')
		->where('file_review.f_land', 'land')
		->get();

		$manage = view('land_admin.all_order')->with('all_order_info', $all_order_info);
		return view('land_admin.land_admin_layout')->with('land_admin.all_order', $manage);
	}

	//show all order....................
	Public function confirm($o_id){
		$this->landAuthCheck();
		return view('land_admin.confirm_order');
	}

	//show all order....................
	public function manage(){

		$this->landAuthCheck();
		$all_order_info = DB::table('tbl_orders')
		->join('file_review','tbl_orders.o_id','=','file_review.o_id')
		->join('tbl_confirm','tbl_orders.o_id','=','tbl_confirm.o_id')
		->select('tbl_orders.*', 'file_review.*', 'tbl_confirm.*')
		->where('tbl_confirm.c_land', 'land')
		->get();

		$manage = view('land_admin.manage')->with('all_order_info', $all_order_info);
		return view('land_admin.land_admin_layout')->with('land_admin.manage', $manage);
	}

	public function confirm_message(Request $request){

		$c_id = Session::get('c_id');
		$data = array();
		$data['c_id'] = $c_id;
		$data['c_message'] = $request->c_message;
		$data['o_id'] = $request->o_id;
		$data['c_land'] = $request->c_land;

		$confirm_id = DB::table('tbl_confirm')->insert($data);
		Session::put('confirm_id', $confirm_id);
		session::put('message', 'Review send!!');
		return Redirect::to('/land-confirm-order/{o_id}');
	}

	public function landAuthCheck(){
		$land_id = Session::get('land_id');
		if ($land_id) {
			return;
		}else{
			return Redirect::to('/land-admin')->send();
		}	

	}
}
