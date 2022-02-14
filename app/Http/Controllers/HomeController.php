<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['banner'] = DB::table('website')->where('category', 'banner')->first();
        $data['opening'] = DB::table('website')->where('category', 'opening')->first();
        $data['vision'] = DB::table('website')->where('category', 'vision')->first();
        $data['mision'] = DB::table('website')->where('category', 'mision')->first();
        $data['youtube'] = DB::table('website')->where('category', 'youtube')->first();
        $data['partner'] = DB::table('partner')->get();
        return view('welcome', $data);
    }
}
