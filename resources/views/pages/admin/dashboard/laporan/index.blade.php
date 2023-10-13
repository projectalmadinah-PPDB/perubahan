@extends('pages.admin.dashboard.layouts.parent')

@section('title','Lolos')

@section('content')
    <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Laporan</h4>
        <div class="row">
          @foreach ($generasi as $item)
            <div class="col-md-3">
              <div class="card card-stats rounded-4 card-warning">
                  <div class="card-body">
                      <div class="row">
                          <div class="">
                            <div class="me-2 text-center">
                            <h6 class="">Data Pendaftar Angkatan {{$item->generasi}}</h6>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                              <label for="" class="form-label text-white fs-6">Download</label>
                              <a href="{{route('admin.laporan.export',$item->id)}}" class="badge badge-primary ms-2"><i class="bi bi-download"></i></a>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
        </div>
        {{-- diagram --}}
        <div class="row">
          <div class="col-12 col-md-8 px-2">
            {{-- grafik pendaftar perbulan --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p class="fs-5 mb-0 fw-bold">Grafik Pendaftar <span class="text-danger fs-6">/ bulan</span></p>
              </div>
              <div class="card-body">
                <canvas id="grafikPendaftar" style="height: 20rem;margin-top:50px"></canvas>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 px-2">
            {{-- catatan aktivitas --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p class="fs-5 mb-0 fw-bold">Log Aktivitas</p>
              </div>
              <div class="card-body">

              </div>
            </div>
          </div>
        </div>
        
        {{-- statistik diagram --}}
        <div class="row">
          <div class="col-6 col-md-4 px-2">
            {{-- statistik rata2 umur pendaftar --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Usia Pendaftar</p>
              </div>
              <div class="card-body">
                
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 px-2">
            {{-- statistik rata2 gender --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Gender</p>
              </div>
              <div class="card-body">

              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 px-2">
            {{-- statistik rata2 pendidikan terakhir --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Pendidikan Terakhir</p>
              </div>
              <div class="card-body">

              </div>
            </div>
          </div>
        </div>

        {{-- tabel --}}
        <div class="row">
          <div class="col-12 col-md-6 px-2">
            {{-- daftar peserta selesai daftar --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Data Lengkap</p>
              </div>
              <div class="card-body">

              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 px-2">
            {{-- daftar peserta belum selesai --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Data Belum Lengkap</p>
              </div>
              <div class="card-body">

              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 px-2">
            {{-- daftar yang udah bayar --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Pembayaran Terbaru</p>
              </div>
              <div class="card-body">

              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 px-2">
            {{-- daftar peserta yang belum / udah diverifikasi dokumen --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Dokumen Terbaru</p>
              </div>
              <div class="card-body">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @php
  @endphp
@endsection

@push('add-script')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>

</script>
@endpush