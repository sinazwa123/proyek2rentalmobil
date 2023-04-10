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
                    <li class="breadcrumb-item">Home</li>
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
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-gray1" style="border-radius:10px 10px 0px 0px;">
        <div class="row">
          <div class="col-6 mt-1">
            <span class="tx-bold text-lg text-white" style="font-size:1.2rem;">
              <i class="far fa-user text-lg"></i> 
              Booking List
            </span>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            @include('sweetalert::alert')
          </div>
        </div>
      </div>

      <div class="card-body">
        <table id="userTable" class="table table-hover table-bordered dt-responsive">
          <thead>
            <tr>
              <th>Nama Pemesan</th>
              <th>Nama Mobil</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Kembali</th>
              <th>Harga/Hari</th>
              <th>Durasi</th>
              <th>Total Harga</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($booking as $item)
            <tr>
              <th>{{$item->nama}}</th>
              <th>{{$item->mobil}}</th>
              <th>{{$item->tanggal_mulai}}</th>
              <th>{{$item->tanggal_kembali}}</th>
              <th>{{$item->harga_per_day}}</th>
              <th>{{$item->jumlah_hari}} Hari</th>
              <th>{{$item->total_harga}}</th>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')

@endsection