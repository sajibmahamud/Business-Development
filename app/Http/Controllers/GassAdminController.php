<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class GassAdminController extends Controller
{
    public function index(){
		return view('gass_admin.gass_admin_login');
	}

	public function gass_login(Request $request){

		$gass_admin_email = $request->gass_admin_email;
		$gass_admin_pass = md5($request->gass_admin_pass);

		$result = DB::table('gass_admin')
		->where('gass_admin_email', $gass_admin_email)
		->where('gass_admin_pass', $gass_admin_pass)
		->first();

		if ($result) {
			session::put('gass_admin_name', $result->gass_admin_name);
			session::put('gass_id', $result->gass_id);
			return Redirect::to('/all-gass-review');
		}else{
			session::put('message', 'Email or Password Invalid!!');
			return Redirect::to('/gass_admin');
		}
	}

	public function gass_dashboard(){
		$this->gassAuthCheck();
		return view('gass_admin.dashboard');
	}

	public function gass_logout(){
		Session::flush();
		return Redirect::to('/gass_admin');
	}

	//show all order....................
	public function all_order(){

		$this->gassAuthCheck();
		$all_order_info = DB::table('tbl_orders')
		->join('file_review','tbl_orders.o_id','=','file_review.o_id')
		->select('tbl_orders.*', 'file_review.*')
		->where('file_review.f_gass', 'gass')
		->get();

		$manage = view('gass_admin.all_order')->with('all_order_info', $all_order_info);
		return view('gass_admin.gass_admin_layout')->with('gass_admin.all_order', $manage);
	}

	//show all order....................
	Public function confirm($o_id){
		$this->gassAuthCheck();
		return view('gass_admin.confirm_order');
	}

	//show all order....................
	public function manage(){

		$this->gassAuthCheck();
		$all_order_info = DB::table('tbl_orders')
		->join('file_review','tbl_orders.o_id','=','file_review.o_id')
		->join('tbl_confirm','tbl_orders.o_id','=','tbl_confirm.o_id')
		->select('tbl_orders.*', 'file_review.*', 'tbl_confirm.*')
		->where('tbl_confirm.c_gass', 'gass')
		->get();

		$manage = view('gass_admin.manage')->with('all_order_info', $all_order_info);
		return view('gass_admin.gass_admin_layout')->with('gass_admin.manage', $manage);
	}

	public function confirm_message(Request $request){

		$c_id = Session::get('c_id');
		$data = array();
		$data['c_id'] = $c_id;
		$data['c_message'] = $request->c_message;
		$data['o_id'] = $request->o_id;
		$data['c_gass'] = $request->c_gass;

		$confirm_id = DB::table('tbl_confirm')->insert($data);
		Session::put('confirm_id', $confirm_id);
		session::put('message', 'Review send!!');
		return Redirect::to('/gass-confirm-order/{o_id}');
	}

	public function gassAuthCheck(){
		$gass_id = Session::get('gass_id');
		if ($gass_id) {
			return;
		}else{
			return Redirect::to('/gass_admin')->send();
		}	

	}
}
