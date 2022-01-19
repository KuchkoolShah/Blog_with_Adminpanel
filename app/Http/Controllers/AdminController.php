<?php

namespace App\Http\Controllers;
use auth;
use Illuminate\Http\Request;
use App\Models\Admin;
class AdminController extends Controller
{

 public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login (Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $user = Admin::where('email', $request->email)->first();
            Auth::guard('admin')->login($user);
            return redirect()->route('admin.home');
        }
        return redirect()->route('admin.login')->with('status', 'Failed To Process Login');
    }



    public function logout(Request $request)
    {
        $this->guard()->logout();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
        ? new JsonResponse([], 204)
        : redirect('/');
    }
    protected function loggedOut(Request $request)
    {
        return redirect()->route('admin.login');
    }
     protected function guard()
    {
        return Auth::guard('admin');
    }
}
