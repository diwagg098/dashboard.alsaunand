<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{
    public function index()
    {
        $pub = DB::table('publication')->select('category', 'img_url', 'title', 'link')->get();
        $data['content'] = $pub->groupBy('category');
        $data['banner'] = DB::table('banner')->where('category', 'publication')->first();
        return view('publication', $data);
    }
}
