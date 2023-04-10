<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use Illuminate\Http\Request;

class PerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['page_title'] = 'Perjalanan';
        $data['breadcumb'] = 'Perjalanan';
        $data['perjalanan'] = Perjalanan::get();
      
        return view('perjalanan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Perjalanan';
        $data['breadcumb'] = 'Perjalanan';
      
        return view('perjalanan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Perjalanan();
        $data->kota_asal = $request->kota_asal;
        $data->kota_tujuan = $request->kota_tujuan;
        $data->km = $request->km;
      
        if($data->save()){
            return redirect()->route('perjalanan-list')->with(['success' => ' Berhasil! ']);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perjalanan  $perjalanan
     * @return \Illuminate\Http\Response
     */
    public function show(Perjalanan $perjalanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perjalanan  $perjalanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perjalanan $perjalanan)
    {
        
        $data['page_title'] = 'Perjalanan';
        $data['breadcumb'] = 'Perjalanan';
        $data['perjalanan'] = Perjalanan::find($id);
      
        return view('pemesan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perjalanan  $perjalanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Perjalanan::find($id);
        $data->kota_asal = $request->kota_asal;
        $data->kota_tujuan = $request->kota_tujuan;
        $data->km = $request->km;
      
        if($data->save()){
            return redirect()->route('perjalanan-list')->with(['success' => ' Berhasil! ']);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perjalanan  $perjalanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perjalanan $perjalanan)
    {
        $data = Perjalanan::find($id);
        if($data->delete()){
            return redirect()->route('perjalanan-list')->with(['success' => ' Berhasil! ']);
        }else{
            return redirect()->back();
        }
    }
}
