<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function index()
    {
        $data['structure'] = DB::table('website')->where('category', 'structure')->first();
        $data['director'] = DB::table('struktur')->where('divisi', 'director')->first();
        $data['all_divisi'] = DB::table('struktur')->where('divisi', '!=', 'director')->get();

        return view('board', $data);
    }
}
