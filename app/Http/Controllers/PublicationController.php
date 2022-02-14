<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{
    public function index()
    {
        $content = DB::table('publication')->orderBy('category', 'asc')->get();
        return view('publication.index', compact('content'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'slug' => 'required|unique:publication,title,except,id',
                'category' => 'required',
                'img_url' => 'max:1024|mimes:png,jpg,PNG,JPG,JPEG,jpeg',
                'link' => 'required',
            ],
            [
                'title.required' => 'Judul harus diisi',
                'category.required' => 'Category Publication harus diisi',
                'slug.unique' => 'Judul sudah ada',
                'img_url.max' => 'Ukuran file terlalu besar',
                'img_url.mimes' => 'Format file tidak sesuai',
                'link.required' => 'Link url masih kosong'
            ]
        );

        $file = $request->file('file');
        if ($file) {
            $fileExt = $file->getClientOriginalExtension();
            $fileName = $request->slug . rand() . '.' . $fileExt;
            $file->move(public_path() . '/img/publication', $fileName);
        }

        $sv = DB::table('publication')->insert([
            'title' => $request->title,
            'slug' => $request->slug,
            'img_url' => $fileName,
            'category' => $request->category,
            'link' => $request->link,
            'post_by' => 'Admin',
            'tgl_post' => date('Y-m-d H:i:s')
        ]);

        if ($sv) {
            toast('Berhasil menambahkan link', 'success', 'top-end');
            return redirect('/publication');
        } else {
            toast('Oops terjadi suatu kesalahan', 'error', 'top-end');
            return redirect('/publication');
        }
    }

    public function destroy($slug)
    {
        try {
            $q = DB::table('publication')->where('slug', $slug)->delete();
            if ($q) {
                toast('Success menghapus link', 'success', 'top-end');
            } else {
                toast('Oops terjadi suatu kesalahan', 'error', 'top-end');
            }
            return redirect('/publication');
        } catch (Exception $e) {
            toast('Oops terjadi suatu kesalahan yang tidak diketahui', 'warning', 'top-end');
            return redirect('publication');
        }
    }
}
