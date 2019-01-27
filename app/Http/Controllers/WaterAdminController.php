<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class WaterAdminController extends Controller
{
    public function index(){
		return view('water_admin.water_admin_login');
	}

	public function water_login(Request $request){

		$water_admin_email = $request->water_admin_email;
		$water_admin_pass = md5($request->water_admin_pass);

		$result = DB::table('water_admin')
		->where('water_admin_email', $water_admin_email)
		->where('water_admin_pass', $water_admin_pass)
		->first();

		if ($result) {
			session::put('water_admin_name', $result->water_admin_name);
			session::put('water_id', $result->water_id);
			return Redirect::to('/all-water-review');
		}else{
			session::put('message', 'Email or Password Invalid!!');
			return Redirect::to('/water-admin');
		}
	}

	public function water_dashboard(){
		$this->waterAuthCheck();
		return view('water_admin.dashboard');
	}

	public function water_logout(){
		Session::flush();
		return Redirect::to('/water-admin');
	}

	//show all order....................
	public function all_order(){

		$this->waterAuthCheck();
		$all_order_info = DB::table('tbl_orders')
		->join('file_review','tbl_orders.o_id','=','file_review.o_id')
		->select('tbl_orders.*', 'file_review.*')
		->where('file_review.f_water', 'water')
		->get();

		$manage = view('water_admin.all_order')->with('all_order_info', $all_order_info);
		return view('water_admin.water_admin_layout')->with('water_admin.all_order', $manage);
	}

	//show all order....................
	Public function confirm($o_id){
		$this->waterAuthCheck();
		return view('water_admin.confirm_order');
	}

	//show all order....................
	public function manage(){

		$this->waterAuthCheck();
		$all_order_info = DB::table('tbl_orders')
		->join('file_review','tbl_orders.o_id','=','file_review.o_id')
		->join('tbl_confirm','tbl_orders.o_id','=','tbl_confirm.o_id')
		->select('tbl_orders.*', 'file_review.*', 'tbl_confirm.*')
		->where('tbl_confirm.c_water', 'water')
		->get();

		$manage = view('water_admin.manage')->with('all_order_info', $all_order_info);
		return view('water_admin.water_admin_layout')->with('water_admin.manage', $manage);
	}

	public function confirm_message(Request $request){

		$c_id = Session::get('c_id');
		$data = array();
		$data['c_id'] = $c_id;
		$data['c_message'] = $request->c_message;
		$data['o_id'] = $request->o_id;
		$data['c_water'] = $request->c_water;

		$confirm_id = DB::table('tbl_confirm')->insert($data);
		Session::put('confirm_id', $confirm_id);
		session::put('message', 'Review send!!');
		return Redirect::to('/manage');
	}

	public function waterAuthCheck(){
		$water_id = Session::get('water_id');
		if ($water_id) {
			return;
		}else{
			return Redirect::to('/water-admin')->send();
		}	

	}


}
