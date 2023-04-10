<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Merek;
use Illuminate\Http\Request;
Use File;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Mobil';
        $data['breadcumb'] = 'Mobil';
        $data['mobil'] = Mobil::get();
      
        return view('mobil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'mobil';
        $data['breadcumb'] = 'mobil';
        $data['merek'] = Merek::get();
      
        return view('mobil.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = new Mobil();
        $data->nama_mobil = $request->nama_mobil;
        $data->banyak_bangku = $request->banyak_bangku;
        $data->merek_id = $request->merek_id;
        $data->plat = $request->plat;
        $data->tahun_mobil = $request->tahun_mobil;
        $data->warna = $request->warna;
        $data->harga_per_day = $request->harga_per_day;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/gambar-mobil/');
            $image->move($destinationPath, $name);
            $data->gambar = $name;
        }
        if($data->save()){
            return redirect()->route('mobil-list')->with(['success' => ' Berhasil! ']);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show(Mobil $mobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'Mobil';
        $data['breadcumb'] = 'Mobil';
        $data['mobil'] = Mobil::find($id);
        $data['merek'] = Merek::get();

      
        return view('mobil.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = Mobil::find($id);
        $data->nama_mobil = $request->nama_mobil;
        $data->banyak_bangku = $request->banyak_bangku;
        $data->merek_id = $request->merek_id;
        $data->plat = $request->plat;
        $data->tahun_mobil = $request->tahun_mobil;
        $data->warna = $request->warna;
        $data->harga_per_day = $request->harga_per_day;
        if ($request->hasFile('gambar')) {
            // Delete Img
            if ($data->gambar) {
                $image_path = public_path('img/gambar-mobil/'.$data->gambar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/gambar-mobil/');
            $image->move($destinationPath, $name);
            $data->gambar = $name;
        }
        if($data->save()){
            return redirect()->route('mobil-list')->with(['success' => ' Berhasil! ']);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mobil::find($id);
        if ($data->gambar) {
            $image_path = public_path('img/gambar-mobil/'.$data->gambar); // Value is not URL but directory file path
            $image_path = public_path('img/gambar-mobil/'.$data->gambar); // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        if($data->delete()){
            return redirect()->route('mobil-list')->with(['success' => ' Berhasil! ']);
        }else{
            return redirect()->back();
        }
    }
}
