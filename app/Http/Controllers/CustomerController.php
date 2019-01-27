<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class CustomerController extends Controller
{
	public function login(){
		return view('customer_login');
	}


	public function registration(){
		return view('customer_registration');
	}


	public function customer_registration(Request $request){
		$data = array();
		$data ['c_name'] = $request->c_name;
		$data ['c_email'] = $request->c_email;
		$data ['c_phone'] = $request->c_phone;
		$data ['c_password'] = md5($request->c_password);

		$c_id = DB::table('tbl_customers')
		->insertGetId($data);

		Session::put('c_id', $c_id);
		Session::put('c_name', $request->c_name);

		return Redirect::to('/'); 					
	}



	public function customer_login(Request $request){

		$c_email = $request->c_email;
		$c_password = md5($request->c_password);

		$result = DB::table('tbl_customers')
		->where('c_email', $c_email)
		->where('c_password', $c_password)
		->first();

		if ($result) {
			session::put('c_name', $result->c_name);
			session::put('c_id', $result->c_id);
                      
			return Redirect::to('/');
		}else{
			session::put('message', 'Email or Password Invalid!!');
			return Redirect::to('/login');
		}
	}


	public function customer_logout(){
		Session::flush();
		return Redirect::to('/');
	}
}
