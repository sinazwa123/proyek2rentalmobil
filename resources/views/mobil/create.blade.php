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

            <form action="{{ route('mobil-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('components.form-message')


                <div class="card-body">

                    <div class="form-group mb-3">
                        <label for="merek">Merek</label>
                        <select  id="" class="form-control  @error('merek_id') is-invalid @enderror" id="merek_id" name="merek_id" value="{{ old('merek_id') }}" >
                            @foreach ($merek as $item)
                                <option value="{{ $item->id }}">{{ $item->merek }}</option>
                            @endforeach
                        </select>

                        @error('merek_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="merek">Nama Mobil</label>
                        <input type="text" class="form-control @error('nama_mobil') is-invalid @enderror" id="nama_mobil" name="nama_mobil" value="{{ old('nama_mobil') }}"  placeholder="Enter Nama Mobil">

                        @error('nama_mobil')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="merek">Banyak Bangku</label>
                        <input type="number" class="form-control @error('banyak_bangku') is-invalid @enderror" id="banyak_bangku" name="banyak_bangku" value="{{ old('banyak_bangku') }}"  placeholder="Enter Banyak Bangku">

                        @error('banyak_bangku')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="merek">Plat</label>
                        <input type="text" class="form-control @error('plat') is-invalid @enderror" id="plat" name="plat" value="{{ old('plat') }}"  placeholder="Enter Plat">

                        @error('plat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="merek">Tahun Mobil</label>
                        <input type="number" class="form-control @error('tahun_mobil') is-invalid @enderror" id="tahun_mobil" name="tahun_mobil" value="{{ old('tahun_mobil') }}"  placeholder="Enter Tahun Beli">

                        @error('tahun_mobil')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="merek">Warna</label>
                        <input type="text" class="form-control @error('warna') is-invalid @enderror" id="warna" name="warna" value="{{ old('warna') }}"  placeholder="Enter Warna Mobil">

                        @error('warna')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="merek">Harga/Hari</label>
                        <input type="number" class="form-control @error('harga_per_day') is-invalid @enderror" id="harga_per_day" name="harga_per_day" value="{{ old('harga_per_day') }}"  placeholder="Enter Harga/Hari">

                        @error('harga_per_day')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="avatar">Gambar</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <div class="small text-danger">*Kosongkan jika tidak mau diisi</div>
                    </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer bg-gray1" style="border-radius:0px 0px 10px 10px;">
                    <button type="submit" class="btn btn-success btn-footer">Add</button>
                    <a href="{{ route('mobil-list') }}" class="btn btn-secondary btn-footer">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
