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
                <h3 class="card-title text-white">Merek Edit</h3>
            </div>
            <form action="{{ route('pemesan-update', $pemesan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                    @include('components.form-message')

                    <div class="form-group mb-3">
                        <label for="merek">Nama Pemesan</label>
                        <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror" id="nama_pemesan" name="nama_pemesan" value="{{ $pemesan->nama_pemesan}}"  placeholder="Enter Nama pemesan">

                        @error('nama_pemesan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="merek">Alamat</label>
                        <textarea name="alamat" class="form-control  @error('alamat') is-invalid @enderror" id="" cols="30" rows="10">{{ $pemesan->alamat}}</textarea>

                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                 
                    <div class="form-group mb-3">
                        <label for="merek">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="">
                            <option value="Laki-Laki" {{ $pemesan == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ $pemesan == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>

                        </select>

                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                 

                    <div class="form-group mb-3">
                        <label for="avatar">Foto Pemesan</label><br>
                        <img src="{{ asset('img/foto-pemesan-mobil/'.($pemesan->foto_pemesan ?? 'user.png')) }}" width="110px"
                        class="image img" /> <br>
                        {{-- {{dd()}} --}}
                        <div class="input-group">
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <div class="small text-danger">*Kosongkan jika tidak mau diisi</div>
                    </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer bg-gray1" style="border-radius:0px 0px 10px 10px;">
                    <button type="submit" class="btn btn-success btn-footer">Save</button>
                    <a href="{{ route('pemesan-list') }}" class="btn btn-secondary btn-footer">Back</a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@section('script')

@endsection