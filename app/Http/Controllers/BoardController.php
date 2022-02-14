<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BoardController extends Controller
{
    public function index()
    {
        $data['structure'] = DB::table('website')->where('category', 'structure')->first();
        $data['director'] = DB::table('struktur')->where('divisi', 'director')->first();
        $data['division'] = DB::table('struktur')->where('divisi', '!=', 'director')->get();
        return view('board.index', $data);
    }

    public function structure(Request $request, $category)
    {
        $request->validate(
            [
                'file' => 'required|max:1024|mimes:png,jpg,jpeg,PNG,JPG,JPEG'
            ],
            [
                'file.required' => 'Belum ada file yang diupload',
                'file.max' => 'Ukuran file terlalu besar',
                'file.mimes' => 'Format file tidak sesuai'
            ]
        );
        $content = DB::table('website')->where('category', $category)->first();
        $file = $request->file('file');
        if ($file) {
            $fileExt = $file->getClientOriginalExtension();
            $fileName = 'structur-' . rand() . '.' . $fileExt;
            $file->move(public_path() . '/img/structure', $fileName);
        }
        $data = [
            'description' => $fileName,
            'category' => $category
        ];

        switch ($content) {
            case true:
                $q = DB::table('website')->where('category', $category)->update($data);
                $message = 'Success menambahkan foto';
                $status = 'success';
                break;
            case false:
                $q = DB::table('website')->insert($data);
                $message = 'Sucess menambahkan foto';
                $status = 'success';
                break;
            default:
                toast('Terjadi suatu kesalahan', 'warning', 'top-end');
                return redirect('/manage-board');
        }

        if ($q) {
            toast($message, $status, 'top-end');
            return redirect('/manage-board');
        } else {
            toast('Oops terjadi suatu kesalahan', 'error', 'top-end');
            return redirect('/manage-board');
        }
    }

    public function director(Request $request, $divisi)
    {
        $request->validate([
            'file' => 'required|max:1024',
            'divisi' => 'required',
        ]);

        $file = $request->file('file');
        if ($file) {
            $fileExt = $file->getClientOriginalExtension();
            $fileName = $request->divisi . '.' . $fileExt;
            $file->move(public_path() . '/img/struktur', $fileName);
        }
        $content = DB::table('struktur')->where('divisi', $divisi)->first();
        switch ($content) {
            case true:
                $q = DB::table('struktur')->where('divisi', $divisi)->update([
                    'divisi' => $divisi,
                    'img_url' => $fileName,
                ]);
                break;
            case false:
                $q = DB::table('struktur')->insert([
                    'divisi' => $divisi,
                    'img_url' => $fileName
                ]);
            default:
                toast('Oops terjadi suatu kesalahan', 'warning', 'top-end');
                return redirect('/manage-board');
        }

        if ($q) {
            toast('Success menambahkan data', 'success', 'top-end');
            return redirect('/manage-board');
        } else {
            toast('Oops terjadi suatu kesalahan', 'error', 'top-end');
            return redirect('/manage-board');
        }
    }

    public function division(Request $request)
    {
        $request->validate(
            [
                'file' => 'required|max:1024',
                'divisi' => 'required'
            ]
        );

        try {
            $file = $request->file('file');
            if ($file) {
                $fileExt = $file->getClientOriginalExtension();
                $fileName = $request->divisi . '.' . $fileExt;
                $file->move(public_path() . '/img/structure', $fileName);
            }

            $content = DB::table('struktur')->where('divisi', $request->divisi)->first();
            switch ($content) {
                case true:
                    $q = DB::table('struktur')->where('divisi', $request->divisi)->update([
                        'divisi' => $request->divisi,
                        'img_url' => $fileName,
                    ]);
                    break;
                case false:
                    $q = DB::table('struktur')->insert([
                        'divisi' => $request->divisi,
                        'img_url' => $fileName
                    ]);
                    break;
                default:
                    toast('Oops terjadi suatu kesalahan', 'warning', 'top-end');
                    return redirect('/manage-board');
            }

            if ($q) {
                toast('success', 'success', 'top-end');
            } else {
                toast('error', 'error', 'top-end');
            }
            return redirect('/manage-board');
        } catch (Exception $e) {
            toast('warning', 'Terjadi suautu kesalahan yang tidak diketahui');
            return redirect('/manage-board');
        }
    }
}
