<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi'
        ]);

        $username = $request->username;
        $password = $request->password;

        $userdata = DB::table('users')->where('username', $username)->first();

        if (!$userdata) {
            return redirect('/login')->with('status', 'Password atau email anda salah');
        }

        if ($userdata->password == $password) {
            $request->session()->put([
                'username' => $userdata->username,
                'nama'  => $userdata->nama,
                'is_login' => 1
            ]);
            Alert::success('Success', 'Authentikasi berhasil');
            return redirect('/')->with('status', 'Anda berhasil login');
        } else {
            return redirect('/login')->with(['status' => 'Password atau email anda salah']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_login');
        return redirect('/login');
    }
}
