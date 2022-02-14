<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        $category = DB::table('event')->groupBy('category')->select('category')->get();
        for ($i = 0; $i < count($category); $i++) {
            $content[] = DB::table('event')->where('category', $category[$i]->category)->get();
        }

        $data['content'] = $content;
        $data['banner'] = DB::table('banner')->where('category', 'event')->first();

        return view('event', $data);
    }
}
