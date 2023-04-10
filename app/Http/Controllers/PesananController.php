<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use App\Models\Mobil;
use App\Models\Pemesan;
use App\Models\Perjalanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use DateTime;
use DB;


class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Pesanan';
        $data['breadcumb'] = 'Pesanan';
        $data['pesanan'] = DB::table('pesanans')
        ->join('pemesans', 'pesanans.id_pemesan', '=', 'pemesans.id')
        ->join('mobils','mobils.id', '=', 'pesanans.id_mobil')
        ->join('perjalanans','perjalanans.id', '=', 'pesanans.id_perjalanan')
        ->select('pesanans.*', 'pemesans.nama_pemesan as nama_pemesan', 'mobils.nama_mobil as mobil','perjalanans.kota_asal as kota_asal','perjalanans.kota_tujuan as kota_tujuan','perjalanans.km as km' )
        ->get();

        // dd($data['pesanan']);
      
        return view('pemesanan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Pesanan';
        $data['breadcumb'] = 'Pesanan';
        $data['jenis'] = JenisPembayaran::get();
        $data['mobil'] = Mobil::get();
        $data['perjalanan'] = Perjalanan::get();
        $data['pemesan'] = Pemesan::get();
      
        return view('pemesanan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tgp = new DateTime($request->tanggal_mulai);
        $tgk = new DateTime($request->tanggal_kembali);
        $durasi = $tgk->diff($tgp)->d;

        $mobil = Mobil::find($request->id_mobil);
        $total_harga = $durasi * (int)$mobil->harga_per_day;

        $data = new Pesanan();
        $data->id_mobil = $request->id_mobil;
        $data->id_perjalanan = $request->id_perjalanan;
        $data->id_pemesan = $request->id_pemesan;
        $data->id_jennis_bayar = $request->id_jennis_bayar;
        $data->tanggal_mulai = $request->tanggal_mulai;
        $data->tanggal_kembali = $request->tanggal_kembali;
        $data->total_harga = $total_harga;
        
        if($data->save()){
            return redirect()->route('pesanan-list')->with(['success' => ' Berhasil! ']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
