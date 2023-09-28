@extends('pages.admin.dashboard.layouts.parent')

@section('title','Lolos')

@section('content')
    <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Laporan Keseluruhan</h4>
        <div class="row">
          @foreach ($data as $item)
            <div class="col-md-3">
              <div class="card card-stats rounded-4 card-warning">
                  <div class="card-body ">
                      <div class="row">
                          <div class="">
                            <div class="me-2">
                            <h6 class="">Seluruh Laporan Angkatan {{$item->generasi}}</h6>
                            </div>
                            <div>
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
      </div>
    </div>
  </div>
@endsection
