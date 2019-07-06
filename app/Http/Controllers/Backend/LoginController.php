<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Backend\Login\LoginRequest;
// use App\Http\Controller\Auth\LoginController;

class LoginController extends Controller
{
	public function getLogin(){
		return view('backend.login.index');
	}
	public function postLogin(LoginRequest $request)
	{
		// $param = $request->only('email', 'password');
		$credentials = array('email' => $request->email, 'password' => $request->password);
		if (Auth::attempt($credentials)) {
			return redirect('/admin');
		}
		else {
			return redirect('/login');
		}
	}

	public function postLogout()
	{
		Auth::logout();
		return redirect('/login');
	}
}
