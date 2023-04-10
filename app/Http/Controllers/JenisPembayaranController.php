<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use Illuminate\Http\Request;

class JenisPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Jenis Pembayaran';
        $data['breadcumb'] = 'Jenis Pembayaran';
        $data['jenis'] = JenisPembayaran::get();

      
        return view('jenis-pembayaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Jenis Pembayaran';
        $data['breadcumb'] = 'Jenis Pembayaran';
      
        return view('jenis-pembayaran.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new JenisPembayaran();
        $data->jenis_pembayaran = $request->jenis_pembayaran;
        if($data->save()){
            return redirect()->route('jenis-pembayaran-list')->with(['success' => ' Berhasil! ']);
        }else{
            return redirect()->back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPembayaran  $jenisPembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPembayaran $jenisPembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPembayaran  $jenisPembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'Jenis Pembayaran';
        $data['breadcumb'] = 'Jenis Pembayaran';
        $data['jenis'] = JenisPembayaran::find($id);
      
        return view('jenis-pembayaran.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisPembayaran  $jenisPembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = JenisPembayaran::find($id);
        $data->jenis_pembayaran = $request->jenis_pembayaran;
        if($data->save()){
            return redirect()->route('jenis-pembayaran-list')->with(['success' => ' Berhasil! ']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPembayaran  $jenisPembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPembayaran $jenisPembayaran)
    {
        $data = JenisPembayaran::find($id);
        if($data->delete()){
            return redirect()->route('jenis-pembayaran-list')->with(['success' => ' Berhasil! ']);
        }
    }
}
