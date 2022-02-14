<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class EventController extends Controller
{
    public function index()
    {
        $content = DB::table('event')->get();
        return view('event.index', compact('content'));
    }

    public function create()
    {
        return view('event.create');
    }
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required',
                'slug' => 'required|unique:event,slug,except,id',
                'category' => 'required',
                'file' => 'max:1024',
                'description' => 'required'
            ],
            [
                'title.required' => 'Judul event harus diisi',
                'slug.required' => 'Judul event sudah ada',
                'category.required' => 'Category event harus dipilih',
                'file.max' => 'Ukuran foto terlalu besar maksimal size 1024',
                'file.mimes' => 'Format file tidak sesuai',
                'description.required' => 'deskripsi harus diisi'
            ]
        );

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $image) {
                $fileExt = $image->getClientOriginalExtension();
                $fileName = Uuid::uuid4() . '.' . $fileExt;
                $image->move(public_path() . '/img/event', $fileName);
                $dataImage[] = $fileName;
            }
        }

        $data = [
            'title' => $request->title,
            'slug' => $request->slug,
            'category' => $request->category,
            'foto' => json_encode($dataImage),
            'description' => $request->description,
            'tgl_post' => date('Y-m-d'),
            'post_by' => 'Alsa Unand'
        ];

        $q = DB::table('event')->insert($data);
        if ($q) {
            toast('Success menambahkan event', 'success', 'top-end');
            return redirect('/event');
        } else {
            toast('Oops terjadi suatu kesalahan', 'error', 'top-end');
            return redirect('/event/create');
        }
    }
}
