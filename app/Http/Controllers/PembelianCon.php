<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;


class PembelianCon extends Controller
{
     public function index()
    {
        if (Auth::user()->role != 'Guest') {
            $pembelian = DB::table('pembelian')->get();
            return view('pembelian', ['pembelian' => $pembelian]);
        } else {
            $pembelian = DB::table('pembelian')->where('kode_pembeli', Auth::user()->id)->get();
            return view('pembelian', ['pembelian' => $pembelian]);
        }
    }

    public function input()
    {
        return view('tambahpembelian');
    }

    public function storeinput(Request $request)
    {

        // insert data ke table tbpembelian
        DB::table('pembelian')->insert([
            'kode_produk' => $request->kodeproduk,
            'banyak' => $request->banyak,
            'kode_pembeli' => auth()->user()->id,
            'bayar' => $request->harga * $request->banyak,
            'status' => 'verifikasi'
        ]);
        // alihkan halaman ke route pembelian
        Session::flash('message', 'Input Berhasil.');
        return redirect('/pembelian');
    }

    public function update($id)
    {
        // mengambil data pembelian berdasarkan id yang dipilih
        $pembelian = DB::table('pembelian')->where('kode_pembelian', $id)->get();
        // passing data pembelian yang didapat ke view edit.blade.php
        return redirect('/pembelian');
    }

    public function storeupdate(Request $request, $id)
    {
        // update data pembelia
        DB::table('pembelian')->where('kode_pembelian', $id)->update([
            'status' => $request->status
        ]);

        // alihkan halaman ke halaman pembelian
        return redirect('/pembelian');
    }

    public function delete($id)
    {
        // mengambil data pembelian berdasarkan id yang dipilih
        DB::table('pembelian')->where('kode_pembelian', $id)->delete();
        // passing data pembelian yang didapat ke view edit.blade.php
        return redirect('/pembelian');
    }
}
