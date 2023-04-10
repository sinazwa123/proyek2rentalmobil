<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Merek';
        $data['breadcumb'] = 'Merek';
        $data['merek'] = Merek::get();
      
        return view('merek.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Merek';
        $data['breadcumb'] = 'Merek';
      
        return view('merek.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Merek();
        $data->merek = $request->merek;
        if($data->save()){
            return redirect()->route('merek-list')->with(['success' => ' Berhasil! ']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function show(Merek $merek)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'Merek';
        $data['breadcumb'] = 'Merek';
        $data['merek'] = Merek::find($id);
      
        return view('merek.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Merek::find($id);
        $data->merek = $request->merek;
        if($data->save()){
            return redirect()->route('merek-list')->with(['success' => ' Berhasil! ']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Merek::find($id);
        if($data->delete()){
            return redirect()->route('merek-list')->with(['success' => ' Berhasil! ']);
        }
    }
}
