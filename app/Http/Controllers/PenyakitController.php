<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PenyakitController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:penyakit-list', ['only' => ['index']]);
         $this->middleware('permission:penyakit-create', ['only' => ['store']]);
         $this->middleware('permission:penyakit-edit', ['only' => ['update', 'json']]);
         $this->middleware('permission:penyakit-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $penyakit = Penyakit::all();

        return view('admin.penyakit.index', compact('penyakit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'penyebab' => 'required',
            'solusi' => 'required',
            'pencegahan' => 'required'
        ]);

        $data = $request->all();

        Penyakit::create($data);

        return back()->with('success', 'Data penyakit berhasil disimpan');
    }

    public function json()
    {
        $data = Penyakit::find(request('id'));

        if (!$data) {
            return response()->json(['error' => 'Penyakit not found'], 404);
        }

        return response()->json($data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'penyebab' => 'required'
        ]);

        $data = $request->all();

        Penyakit::find($request->id)->update($data);

        return back()->with('success', 'Data penyakit berhasil diubah');
    }

    public function destroy(Penyakit $penyakit)
    {
        $penyakit->delete();
        return back()->with('success', 'Data penyakit berhasil dihapus');
    }
}
