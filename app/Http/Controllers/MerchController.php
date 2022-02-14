<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MerchController extends Controller
{
    public function index()
    {
        $content = DB::table('marchandise')->get();
        return view('merch.index', compact('content'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_produk' => 'required',
                'link_produk' => 'required',
                'file' => 'required|max:1024|mimes:png,jpg,JPG,PNG,jpeg,JPEG',
                'harga_produk' => 'required|numeric'
            ],
            [
                'nama_produk.required' => 'Nama Produk harus diisi',
                'link_produk.required' => 'Link produk harus diisi',
                'file.required' => 'Belum ada file yang diupload',
                'file.mimes' => 'Format file tidak sesuai',
                'harga_produk.required' => 'Harga harus diisi',
                'harga_produk.numeric' => 'Format harga tidak sesuai'
            ]
        );

        $file = $request->file('file');
        if ($file) {
            $fileExt = $file->getClientOriginalExtension();
            $fileName = 'produk-' . rand() . '.' . $fileExt;
            $file->move(public_path() . '/img/produk', $fileName);
        }

        $sv = DB::table('marchandise')->insert(
            [
                'nama_produk' => $request->nama_produk,
                'link_produk' => $request->link_produk,
                'foto' => $fileName,
                'harga_produk' => $request->harga_produk,
                'description' => $request->description
            ]
        );

        if ($sv) {
            toast('Berhasil menambahkan produk', 'success', 'top-end');
        } else {
            toast('Oops terjadi suatu kesalahan', 'error', 'top-end');
        }
        return redirect('/merch');
    }

    public function destroy($id)
    {
        $dlt = DB::table('marchandise')->where('id', $id)->delete();
        if ($dlt) {
            toast('Success menghapus produk', 'success', 'top-end');
        } else {
            toast('Oops terjadi suatu kesalahan', 'error', 'top-end');
        }

        return redirect('/merch');
    }
}
