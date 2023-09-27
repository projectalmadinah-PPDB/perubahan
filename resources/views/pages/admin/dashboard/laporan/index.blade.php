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
                          <div>
                            <a href="{{route('admin.laporan.export',$item->id)}}">Download Laporan {{$item->generasi}}</a>
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