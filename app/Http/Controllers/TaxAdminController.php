<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class TaxAdminController extends Controller
{
    public function index(){
		return view('tax_admin.tax_admin_login');
	}

	public function tax_login(Request $request){

		$tax_admin_email = $request->tax_admin_email;
		$tax_admin_pass = md5($request->tax_admin_pass);

		$result = DB::table('tax_admin')
		->where('tax_admin_email', $tax_admin_email)
		->where('tax_admin_pass', $tax_admin_pass)
		->first();

		if ($result) {
			session::put('tax_admin_name', $result->tax_admin_name);
			session::put('tax_id', $result->tax_id);
			return Redirect::to('/all-tax-review');
		}else{
			session::put('message', 'Email or Password Invalid!!');
			return Redirect::to('/tax-admin');
		}
	}

	public function tax_dashboard(){
		$this->taxAuthCheck();
		return view('tax_admin.dashboard');
	}

	public function tax_logout(){
		Session::flush();
		return Redirect::to('/tax-admin');
	}

	//show all order....................
	public function all_order(){

		$this->taxAuthCheck();
		$all_order_info = DB::table('tbl_orders')
		->join('file_review','tbl_orders.o_id','=','file_review.o_id')
		->select('tbl_orders.*', 'file_review.*')
		->where('file_review.f_tax', 'tax')
		->get();

		$manage = view('tax_admin.all_order')->with('all_order_info', $all_order_info);
		return view('tax_admin.tax_admin_layout')->with('tax_admin.all_order', $manage);
	}

	//show all order....................
	Public function confirm($o_id){
		$this->taxAuthCheck();
		return view('tax_admin.confirm_order');
	}

	//show all order....................
	public function manage(){

		$this->taxAuthCheck();
		$all_order_info = DB::table('tbl_orders')
		->join('file_review','tbl_orders.o_id','=','file_review.o_id')
		->join('tbl_confirm','tbl_orders.o_id','=','tbl_confirm.o_id')
		->select('tbl_orders.*', 'file_review.*', 'tbl_confirm.*')
		->where('tbl_confirm.c_tax', 'tax')
		->get();

		$manage = view('tax_admin.manage')->with('all_order_info', $all_order_info);
		return view('tax_admin.tax_admin_layout')->with('tax_admin.manage', $manage);
	}

	public function confirm_message(Request $request){

		$c_id = Session::get('c_id');
		$data = array();
		$data['c_id'] = $c_id;
		$data['c_message'] = $request->c_message;
		$data['o_id'] = $request->o_id;
		$data['c_tax'] = $request->c_tax;

		$confirm_id = DB::table('tbl_confirm')->insert($data);
		Session::put('confirm_id', $confirm_id);
		session::put('message', 'Review send!!');
		return Redirect::to('/tax-confirm-order/{o_id}');
	}

	public function taxAuthCheck(){
		$tax_id = Session::get('tax_id');
		if ($tax_id) {
			return;
		}else{
			return Redirect::to('/tax-admin')->send();
		}	

	}
}
