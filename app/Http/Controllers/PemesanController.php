<?php

namespace App\Http\Controllers;

use App\Models\Pemesan;
use Illuminate\Http\Request;

class PemesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Pemesan';
        $data['breadcumb'] = 'Pemesan';
        $data['pemesan'] = Pemesan::get();
      
        return view('pemesan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Pemesan';
        $data['breadcumb'] = 'Pemesan';
      
        return view('pemesan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pemesan();
        $data->nama_pemesan = $request->nama_pemesan;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jenis_kelamin;
        if ($request->hasFile('foto_pemesan')) {
            $image = $request->file('foto_pemesan');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/foto-pemesan-mobil/');
            $image->move($destinationPath, $name);
            $data->foto_pemesan = $name;
        }
        if($data->save()){
            return redirect()->route('pemesan-list')->with(['success' => ' Berhasil! ']);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesan  $pemesan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesan $pemesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesan  $pemesan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'Pemesan';
        $data['breadcumb'] = 'Pemesan';
        $data['pemesan'] = Pemesan::find($id);
      
        return view('pemesan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemesan  $pemesan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Pemesan::find($id);
        $data->nama_pemesan = $request->nama_pemesan;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jenis_kelamin;
        if ($request->hasFile('foto_pemesan')) {
            // Delete Img
            if ($data->foto_pemesan) {
                $image_path = public_path('img/foto-pemesan-mobil/'.$data->foto_pemesan); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            
            $image = $request->file('foto_pemesan');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/foto-pemesan-mobil/');
            $image->move($destinationPath, $name);
            $data->foto_pemesan = $name;
        }
        if($data->save()){
            return redirect()->route('pemesan-list')->with(['success' => ' Berhasil! ']);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesan  $pemesan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pemesan::find($id);
        if ($data->foto_pemesan) {
            $image_path = public_path('img/foto-pemesan-mobil/'.$data->foto_pemesan); // Value is not URL but directory file path
            $image_path = public_path('img/foto-pemesan-mobil/'.$data->foto_pemesan); // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        if($data->delete()){
            return redirect()->route('pemesan-list')->with(['success' => ' Berhasil! ']);
        }else{
            return redirect()->back();
        }
    }
}
