<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->input());
        //dd: vừa var_dum vừa die
        $this->validate($request, [
            'email' => 'required | email: filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input( 'email'),
            'password' => $request->input( 'password')
        ], $request->input( 'remember'))) {
            return redirect()->route( 'admin');
        }

        Session()->flash("error", "Email hoặc Password không đúng");
        return redirect()->back();
    }
}
