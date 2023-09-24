@extends('pages.admin.dashboard.layouts.parent')

@section('title','Biodata Document')

@section('content')
<div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Document</h4>
        <div class="row">
          <div class="col-md-12">
            
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="card-title">Detail Document {{$document->user->name}}</div>
                  <a href="{{route('admin.peserta.index')}}" class="btn btn-primary float-end text-white">Back</a>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <label class="form-label fs-6 mb-2">
                      Kartu Keluarga
                      <a href="{{ asset('storage/' . $document->kk) }}" target="_blank" class="badge badge-info border-0 ms-2">Show <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                    </label>
                    <object class="rounded-4" data="{{ asset('storage/' . $document->kk) }}" type="application/pdf" width="100%" height="600px">
                      <p>Maaf, browser Anda tidak mendukung tampilan PDF. Anda bisa <a href="{{ asset('storage/' . $document->kk) }}">mengunduh file PDF</a> sebagai alternatif.</p>
                    </object>
                  </div>
                  <div class="col-6">
                    <label class="form-label fs-6 mb-2">
                      Ijazah
                      <a href="{{ asset('storage/' . $document->ijazah) }}" target="_blank" class="badge badge-info border-0 ms-2">Show <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                    </label>
                    <object class="rounded-4" data="{{ asset('storage/' . $document->ijazah) }}" type="application/pdf" width="100%" height="600px">
                      <p>Maaf, browser Anda tidak mendukung tampilan PDF. Anda bisa <a href="{{ asset('storage/' . $document->kk) }}">mengunduh file PDF</a> sebagai alternatif.</p>
                    </object>
                  </div>
                  <div class="col-6">
                    <label class="form-label fs-6 mb-2">
                      Akta
                      <a href="{{ asset('storage/' . $document->akta) }}" target="_blank" class="badge badge-info border-0 ms-2">Show <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                    </label>
                    <object class="rounded-4" data="{{ asset('storage/' . $document->akta) }}" type="application/pdf" width="100%" height="600px">
                      <p>Maaf, browser Anda tidak mendukung tampilan PDF. Anda bisa <a href="{{ asset('storage/' . $document->kk) }}">mengunduh file PDF</a> sebagai alternatif.</p>
                    </object>
                  </div>
                  <div class="col-6">
                    <label class="form-label fs-6 mb-2">
                      Rapor
                      <a href="{{ asset('storage/' . $document->rapor) }}" target="_blank" class="badge badge-info border-0 ms-2">Show <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                    </label>
                    <object class="rounded-4" data="{{ asset('storage/' . $document->rapor) }}" type="application/pdf" width="100%" height="600px">
                      <p>Maaf, browser Anda tidak mendukung tampilan PDF. Anda bisa <a href="{{ asset('storage/' . $document->kk) }}">mengunduh file PDF</a> sebagai alternatif.</p>
                    </object>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
@endsection