<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaketRequest;
use App\Models\Paket;
use Illuminate\Auth\Events\Validated;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::latest()->get();
        return view('admin.paket.paket', [
            'pakets' => $pakets
        ]);
    }

    public function tambah()
    {
        return view('admin.paket.tambahPaket');
    }

    public function store(PaketRequest $request)
    {
        $waktu = $request->batas_waktu.' '.$request->waktu;
        Paket::create([
            'nama_paket' => $request->nama_paket,
            'batas_waktu' => $waktu,
            'harga' => $request->harga
        ]);
    
        return redirect('/paket');
    }

    public function edit(Paket $paket)
    {
        $waktu = explode(' ', $paket->batas_waktu);
        return view('admin.paket.editPaket', [
            'paket' => $paket,
            'waktu' => end($waktu),
            'batas' => collect($waktu)->first()
        ]);
    }

    public function update(PaketRequest $request, Paket $paket)
    {
        $waktu = $request->batas_waktu.' '.$request->waktu;
        Paket::where('id', $paket->id)->update([
            'nama_paket' => $request->nama_paket,
            'batas_waktu' => $waktu,
            'harga' => $request->harga
        ]);

        return redirect('/paket');
    }

    public function delete(Paket $paket)
    {
        Paket::destroy($paket->id);

        return redirect('/paket')->with('deleted', 'Admin has been deleted!');
    }
}
