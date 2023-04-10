<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Mobil;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Auth;
use DB;

class BookingController extends Controller
{

    public function booking(Request $request){

        $tgp = new DateTime($request->tanggal_mulai);
        $tgk = new DateTime($request->tanggal_kembali);
        $durasi = $tgk->diff($tgp)->d;

        $mobil = Mobil::find($request->id_mobil);
        $total_harga = $durasi * $mobil->harga_per_day;

        $data = new Booking();
        $data->id_mobil = $request->id_mobil;
        $data->tlp = $request->tlp;
        $data->tanggal_mulai = $request->tanggal_mulai;
        $data->tanggal_kembali = $request->tanggal_kembali;
        $data->id_jenis_pembayaran = $request->id_jenis_pembayaran;
        $data->jumlah_hari = $durasi;
        $data->total_harga = $total_harga;
        $data->id_user = Auth::user()->id;
        
        if($data->save()){
            return redirect()->route('riwayat-pemesanan')->with(['success' => ' Berhasil! ']);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Booking';
        $data['breadcumb'] = 'Booking';
        $data['title'] = 'Rental Mobil Indramayu';
        $data['header'] = 'Siffa World';
        $data['booking'] = DB::table('bookings')
        ->join('users', 'bookings.id_user', '=', 'users.id')
        ->join('mobils','mobils.id', '=', 'bookings.id_mobil')
        ->select('bookings.*', 'mobils.nama_mobil as mobil', 'mobils.harga_per_day as harga_per_day', )
        ->where('bookings.id_user',Auth::user()->id)
        ->get();
      
        return view('home.riwayat-pemesanan', $data);
    }
    public function indexAdmin()
    {
        $data['page_title'] = 'Booking';
        $data['breadcumb'] = 'Booking';
     
        $data['booking'] = DB::table('bookings')
        ->join('users', 'bookings.id_user', '=', 'users.id')
        ->join('mobils','mobils.id', '=', 'bookings.id_mobil')
        ->select('bookings.*', 'mobils.nama_mobil as mobil', 'mobils.harga_per_day as harga_per_day', 'users.name as nama', )
        ->get();
      
        return view('booking.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
