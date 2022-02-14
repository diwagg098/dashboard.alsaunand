<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(
            [
                'file' => 'required|max:1024|mimes:png,jpg,PNG,JPG,jpeg',
                'partner_name' => 'required'
            ],
            [
                'partner_name.required' => 'Nama partner harus diisi',
                'file.required' => 'Belum ada file yang di upload',
                'file.max' => 'Ukuran file terlalu besar',
                'file.mimes' => 'Format tidak sesuai'
            ]
        );

        try {
            $file = $request->file('file');
            if ($file) {
                $fileExt = $file->getClientOriginalExtension();
                $fileName = 'partner-' . rand() . '.' . $fileExt;
                $file->move(public_path() . '/img/partner', $fileName);
            }

            $sv = DB::table('partner')->insert([
                'img_url' => $fileName,
                'title' => $request->partner_name
            ]);

            if ($sv) {
                toast('Partner telah ditambahkan', 'success', 'top-end');
                return redirect('/manage-website');
            } else {
                toast('Oops terjadi suatu kesalahan', 'error', 'top-end');
                return redirect('/manage-website');
            }
        } catch (Exception $e) {
            toast('Oops terjadi suatu kesalahan yang tidak diketahui');
            return redirect('/manage-website');
        }
    }

    public function destroy($id)
    {
        $q = DB::table('partner')->where('id_partner', $id)->delete();
        if ($q) {
            toast('Berhasil', 'success', 'top-end');
            return redirect('/manage-website');
        } else {
            toast('Gagal', 'error', 'top-end');
            return redirect('/manage-website');
        }
    }
}
