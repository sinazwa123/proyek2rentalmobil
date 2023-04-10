@extends('layouts.app')

@section('style')

@endsection

@section('breadcumb')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ ($breadcumb ?? '') }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">home</li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item"><a href="{{ route('master-data.index') }}">Master Data</a></li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">{{ ($breadcumb ?? '') }}</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header text-center bg-gray1" style="border-radius:10px 10px 0px 0px;">
                <h3 class="card-title text-white">Add Merek</h3>
            </div>

            <form action="{{ route('pesanan-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('components.form-message')


                <div class="card-body">

                    <div class="form-group mb-3">
                        <label for="merek">Pemesan</label>
                        <select name="id_pemesan" class="form-control" id="">
                            @foreach ($pemesan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_pemesan }}</option>
                            @endforeach
                        </select>

                        @error('id_pemesan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="merek">Mobil</label>
                        <select name="id_mobil" class="form-control" id="">
                            @foreach ($mobil as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_mobil }}</option>
                            @endforeach
                        </select>

                        @error('id_pemesan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="merek">Perjalanan</label>
                        <select name="id_perjalanan" class="form-control" id="">
                            @foreach ($perjalanan as $item)
                                <option value="{{ $item->id }}">{{ $item->kota_asal .' - '. $item->kota_tujuan .' ( ' . $item->km . 'KM' .' )'  }}</option>
                            @endforeach
                        </select>

                        @error('id_pemesan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="merek">Jenis Bayar</label>
                        <select name="id_jennis_bayar" class="form-control" id="">
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id }}">{{ $item->jenis_pembayaran }}</option>
                            @endforeach
                        </select>

                        @error('id_pemesan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="merek">Tanggal Mulai</label>
                        <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value=""  placeholder="Enter tanggal_mulai">
  
                        @error('tanggal_mulai')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="merek">Tanggal Kembali</label>
                        <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror" id="tanggal_kembali" name="tanggal_kembali" value=""  placeholder="Enter tanggal_kembali">
  
                        @error('tanggal_kembali')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer bg-gray1" style="border-radius:0px 0px 10px 10px;">
                    <button type="submit" class="btn btn-success btn-footer">Add</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary btn-footer">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection