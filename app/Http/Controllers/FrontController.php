<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class FrontController extends Controller
{
   	public function index(){
   		return view('front.home');
   	}

   	//show all order....................
	public function feedback(){

		$all_order_info = DB::table('tbl_orders')
		->join('file_review','tbl_orders.o_id','=','file_review.o_id')
		->join('tbl_confirm','tbl_orders.o_id','=','tbl_confirm.o_id')
		->select('tbl_orders.*', 'file_review.*', 'tbl_confirm.*')
		->get();

		$manage = view('front.all_advise')->with('all_order_info', $all_order_info);
		return view('profile_layout')->with('front.all_advise', $manage);
	}
}
