<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransaksiRequest;
use App\Models\Diskon;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Redis;
use PhpParser\Builder\Trait_;

class TransaksiController extends Controller
{
    public function index()
    {
        $pesanans = Transaksi::latest()->get();
        // dd($pesanans);
        return view('order.pesanan', [
            'pesanans' => $pesanans
        ]);
    }

    public function tambah()
    {
        $paket = Paket::all();
        return view('order.tambahPesanan', [
            'pakets' => $paket
        ]);
    }

    public function store(TransaksiRequest $request)
    {
        // dd($this->cariHargaPaket($request->paket_id));
        $no = time();
        $waktu = explode(' ', $this->cariIdPaket($request->paket_id));
        $tgl_keluar = 86400 * collect($waktu)->first();

        $request['user_id'] = 1;
        $request['kode_invoice'] = 'fl'.$no;
        $request['tgl_keluar'] = date('Y-m-d', time()+$tgl_keluar);
        $request['status'] = 'baru';
        $request['total_harga'] = $this->cariHargaPaket($request->paket_id) * $request->qty;
        Transaksi::create($request->all());

        return redirect('/pesanan');
    }

    public function cariIdPaket($paket)
    {
        $transaksi = Paket::all()->find($paket);
        $batas_waktu = $transaksi->id;
        return $batas_waktu;
    }

    public function cariHargaPaket($paket)
    {
        $transaksi = Paket::all()->find($paket);
        $harga = $transaksi->harga;
        return $harga;
    }

    public function edit(Transaksi $pesanan)
    {
        $paket = Paket::all();
        return view('order.editPesanan', [
            'pesanan' => $pesanan,
            'pakets' => $paket
        ]);
    }

    public function update(TransaksiRequest $request, Transaksi $pesanan)
    {
        $no = time();
        $waktu = explode(' ', $this->cariIdPaket($request->paket_id));
        $tgl_keluar = 86400 * collect($waktu)->first();
        
        $request['user_id'] = 1;
        $request['kode_invoice'] = 'fl'.$no;
        $request['tgl_keluar'] = date('Y-m-d', time()+$tgl_keluar);
        $request['status'] = 'baru';
        $request['total_harga'] = $this->cariHargaPaket($request->paket_id) * $request->qty;
        // dd($request);
        // dd('faja');

        Transaksi::where('id', $pesanan->id)->update($request->only([
            'paket_id',
            'user_id',
            'diskon',
            'kode_invoice',
            'nama_pelanggan',
            'tgl_masuk',
            'tgl_keluar',
            'qty',
            'status',
            'total_harga'
        ]));

        return redirect('/pesanan');
    }

    public function delete(Transaksi $pesanan)
    {
        Transaksi::destroy($pesanan->id);

        return redirect('/pesanan')->with('deleted', 'Admin has been deleted!');
    }
}
