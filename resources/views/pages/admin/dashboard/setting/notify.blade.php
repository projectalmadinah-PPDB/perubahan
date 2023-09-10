@extends('pages.admin.dashboard.layouts.parent')

@section('title','Edit Profile')

@section('content')
<div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session('success')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
        @elseif(session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session('delete')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session('edit'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          {{session('edit')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="card-title">Notifikasi Setting</div>
                </div>
              </div>
              <div class="card-body">
                <form action="{{route('admin.setting.notify.update')}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Notifikasi OTP</label>
                                <textarea class="form-control" rows="5" name="notif_otp">{{$notif->notif_otp}}</textarea>
                            </div>
                            <div class="mb-2">
                              <label for="" class="form-label">Notifikasi Gagal OTP</label>
                              <textarea class="form-control" rows="5" name="notif_gagal_otp">{{$notif->notif_gagal_otp}}</textarea>
                          </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Notifikasi Lolos</label>
                                <textarea name="notif_lolos" rows="5" id="" class="form-control">{{$notif->notif_lolos}}</textarea>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Notifikasi Gagal</label>
                                <textarea name="notif_gagal" rows="5" id="" class="form-control">{{$notif->notif_gagal}}</textarea>
                            </div>
                            <div class="mb-2">
                              <label for="" class="form-label">Notifikasi Verifikasi</label>
                              <textarea name="notif_verify" rows="5" id="" class="form-control">{{$notif->notif_verify}}</textarea>
                            </div>
                            <div class="mb-2">
                              <label for="" class="form-label">Notifikasi Belum Verifikasi</label>
                              <textarea name="notif_belum_verify" rows="5" id="" class="form-control">{{$notif->notif_belum_verify}}</textarea>
                            </div>
                            <div class="mb-2">
                              <label for="" class="form-label">Notifikasi Tidak Sah</label>
                              <textarea name="notif_tidak_sah" id="" rows="5" class="form-control">{{$notif->notif_tidak_sah}}</textarea>
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Notifikasi Pembayaran</label>
                                <textarea name="notif_pembayaran" rows="5" id="" class="form-control">{{$notif->notif_pembayaran}}</textarea>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Notifikasi Informasi Wawancara</label>
                                <textarea name="notif_info" rows="5" id="" class="form-control">{{$notif->notif_info}}</textarea>
                            </div>
                            <div class="mb-2">
                              <label for="" class="form-label">Notifikasi Wawancara</label>
                              <textarea name="notif_wawancara" rows="5" id="" class="form-control">{{$notif->notif_wawancara}}</textarea>
                          </div>
                          <div class="mb-2">
                              <label for="" class="form-label">Notifikasi Wawancara Info</label>
                              <textarea name="notif_info" rows="5" id="" class="form-control">{{$notif->notif_info}}</textarea>
                          </div>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
@endsection