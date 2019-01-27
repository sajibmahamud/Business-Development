<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();


class ReviewController extends Controller
{
	public function review_govt_office(Request $request){

		$c_id = Session::get('c_id');

		$data = array();
		$data['c_id'] = $c_id;
		$data['o_id'] = $request->o_id;
		$data['f_soil'] = $request->soil;
		$data['f_gass'] = $request->gass;
		$data['f_land'] = $request->land;
		$data['f_water'] = $request->water;
		$data['f_tax'] = $request->tax;
		$data['status'] = 1;

		$f_id = DB::table('file_review')->insert($data);
		Session::put('f_id', $f_id);
		session::put('message', 'File are now under Review!!');
		return Redirect::to('/review-order/{o_id}');
	}

	public function confirm_message(Request $request){

		$c_id = Session::get('c_id');
		$data = array();
		$data['c_id'] = $c_id;
		$data['c_message'] = $request->c_message;
		$data['o_id'] = $request->o_id;


		$confirm_id = DB::table('tbl_confirm')->insert($data);
		Session::put('confirm_id', $confirm_id);
		session::put('message', 'Review send!!');
		return Redirect::to('/confirm-order/{o_id}');
	}

}
