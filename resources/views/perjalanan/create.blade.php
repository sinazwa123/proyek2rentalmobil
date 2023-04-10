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
                <h3 class="card-title text-white">Add perjalanan</h3>
            </div>

            <form action="{{ route('perjalanan-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('components.form-message')


                <div class="card-body">

                    <div class="form-group mb-3">
                        <label for="perjalanan">Kota Asal</label>
                        <input type="text" class="form-control @error('kota_asal') is-invalid @enderror" id="kota_asal" name="kota_asal" value="{{ old('kota_asal') }}"  placeholder="Enter Kota Asal">

                        @error('kota_asal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="perjalanan">Kota Tujuan</label>
                        <input type="text" class="form-control @error('kota_tujuan') is-invalid @enderror" id="kota_tujuan" name="kota_tujuan" value="{{ old('kota_tujuan') }}"  placeholder="Enter Kota Tujuan">

                        @error('kota_tujuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="perjalanan">Jarak (KM)</label>
                        <input type="integer" class="form-control @error('km') is-invalid @enderror" id="km" name="km" value="{{ old('km') }}"  placeholder="Enter Kota Tujuan">

                        @error('km')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer bg-gray1" style="border-radius:0px 0px 10px 10px;">
                    <button type="submit" class="btn btn-success btn-footer">Add</button>
                    <a href="{{ route('perjalanan-list') }}" class="btn btn-secondary btn-footer">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection