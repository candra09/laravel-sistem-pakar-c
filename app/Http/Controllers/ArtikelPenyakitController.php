<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelPenyakitController extends Controller
{
    //
    public function gerd()
    {
        return view('admin.artikel.penyakit-gerd');
    }
    public function dispepsia()
    {
        return view('admin.artikel.penyakit-dispepsia');
    }
    public function tukak_lambung()
    {
        return view('admin.artikel.penyakit-tukak-lambung');
    }
    public function maag()
    {
        return view('admin.artikel.penyakit-maag');
    }
}
