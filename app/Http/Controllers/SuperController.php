<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class SuperController extends Controller
{
    public function index(){
		$this->adminAuthCheck();
		return view('back.dashboard');
	}

	public function logout(){
		Session::flush();
		return Redirect::to('admin_backend');
	}

	public function adminAuthCheck(){
		$admin_id = Session::get('admin_id');
		if ($admin_id) {
			return;
		}else{
			return Redirect::to('/admin_backend')->send();
		}	

	}
}
