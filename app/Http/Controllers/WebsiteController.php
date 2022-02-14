<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Cache\RedisStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index()
    {
        $data['banner'] = DB::table('website')->where('category', 'banner')->first();
        $data['opening'] = DB::table('website')->where('category', 'opening')->first();
        $data['vision'] = DB::table('website')->where('category', 'vision')->first();
        $data['mision'] = DB::table('website')->where('category', 'mision')->first();
        $data['youtube'] = DB::table('website')->where('category', 'youtube')->first();
        $data['partner'] = DB::table('partner')->get();
        return view('website.index', $data);
    }
    public function store(Request $request, $category)
    {
        $request->validate(
            [
                'description' => 'required',
            ],
            [
                'description.required' => 'Deskripsi harus diisi'
            ]
        );

        try {
            $content = DB::table('website')->where('category', $category)->first();
            if ($content) {
                $update = DB::table('website')->where('category', $category)->update([
                    'description' => $request->description
                ]);

                if ($update) {
                    toast('Berhasil menambah ' . $category, 'success')->position('top-end');
                    return redirect('/manage-website');
                } else {
                    toast('Gagal menambah ' . $category, 'error')->position('top-end');
                }
            } else {
                $sv = DB::table('website')->insert([
                    'description' => $request->description,
                    'category' => $category
                ]);

                if ($sv) {
                    toast('Berhasil menambah ' . $category, 'success')->position('top-end');
                    return redirect('/manage-website');
                } else {
                    toast('Gagal menambah ' . $category, 'error')->position('top-end');
                    return redirect('/manage-website');
                }
            }
        } catch (Exception $e) {
            toast('warning', 'Terjadi kesalahan yang tidak diketahui', 'top-end');
            return redirect('/manage-website');
        }
    }

    public function storeFile(Request $request, $category)
    {
        $request->validate(
            [
                'file' => 'required|max:1024|mimes:png,jpg,PNG,JPG,JPEG,jpeg'
            ],
            [
                'file.required' => 'Belum ada file yang diupload',
                'file.max' => 'Ukuran file terlalu besar',
                'file.mimes' => 'Format file tidak sesuai'
            ]
        );

        try {
            $file = $request->file('file');
            if ($file) {
                $fileExt = $file->getClientOriginalExtension();
                $fileName = rand() . '.' . $fileExt;
                $file->move(public_path() . '/img/banner', $fileName);
            }

            if (!DB::table('website')->where('category', $category)->first()) {
                $sv = DB::table('website')->insert([
                    'description' => $fileName,
                    'category' => $category
                ]);

                if ($sv) {
                    toast('Berhasil menambahkan ' . $category, 'success')->position('top-end');
                    return redirect('/manage-website');
                } else {
                    toast('Oops terjadi suatu kesalahan', 'error', 'top-end');
                }
            } else {
                DB::table('website')->where('category', $category)->update([
                    'description' => $fileName,
                ]);
                toast('Berhasil mengupdate ' . $category, 'success', 'top-end');
                return redirect('/manage-website');
            }
        } catch (Exception $e) {
            toast('Terjadi suatu kesalahan yang tidak diketahui', 'warning', 'top-end');
            return redirect('/manage-website');
        }
    }

    public function youtube(Request $request)
    {
        $request->validate(
            [
                'description' => 'required'
            ],
            [
                'description.required' => 'Deskripsi harus diisi'
            ]
        );

        try {
            $content = DB::table('website')->where('category', 'youtube')->first();
            // https://www.youtube.com/watch?v=1s9DXDLt4JE
            $description = $request->description;
            $replace = str_replace('watch?v=', 'embed/', $description);
            if ($content) {
                $update = DB::table('website')->where('category', 'youtube')->update([
                    'description' => $replace
                ]);
                if ($update) {
                    toast('Success', 'success', 'top-end');
                    return redirect('/manage-website');
                } else {
                    toast('Error', 'error', 'top-end');
                    return redirect('/manage-website');
                }
            } else {
                $sv = DB::table('website')->insert([
                    'description' => $replace,
                    'category' => 'youtube'
                ]);

                if ($sv) {
                    toast('Success', 'success', 'top-end');
                    return redirect('/manage-website');
                } else {
                    toast('Error', 'error', 'top-end');
                    return redirect('/manage-website');
                }
            }
        } catch (Exception $e) {
            toast('Terjadi suatu kesalahan', 'warning', 'top-end');
            return redirect('/manage-website');
        }
    }
}
