<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
	public function login()
	{
		return view("admin.login");
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, [
			"email" => "required",
			"password" => "required",
		]);

		$remember = ($request->has('remember')) ? true : false;

		$auth = Auth::attempt(
			[
				'email'  => strtolower($request->get('email')),
				'password'  => $request->get('password')
			],
			$remember
		);

		if ($auth) {
			return redirect()->to('admin/settings');
		} else {
			return redirect()->to('admin')->with('flash_notice', 'Your email/password combination was incorrect.');
		}
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->to('admin');
	}
}
