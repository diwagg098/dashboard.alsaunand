<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumniController extends Controller
{
    public function index()
    {
        $data['content'] = DB::table('alumni')->get();
        $data['banner'] = DB::table('banner')->where('category','alumni')->first();
        return view('alumni',$data);
    }
}
