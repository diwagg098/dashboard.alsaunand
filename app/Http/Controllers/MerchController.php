<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MerchController extends Controller
{
    public function index()
    {
        $content = DB::table('marchandise')->get();
        return view('merch', compact('content'));
    }
}
