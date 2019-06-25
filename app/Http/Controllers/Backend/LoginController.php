<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{
	public function getLogin(){
		return view('backend.login.index');
	}
	public function postLogin(Request $request)
	{
		$param = $request->only('email', 'password');
		if (Auth::attempt($param)) {
			return redirect('/admin');
		}else {
			echo 'Đăng Nhập Thất Bại';
		}
		// return view('backend.login.index');
	}

	public function logout()
	{
		Auth::logout();
		return redirect('/admin/login');
	}
}
