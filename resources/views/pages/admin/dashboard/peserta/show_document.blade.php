@extends('pages.admin.dashboard.layouts.parent')

@section('title','Biodata Document')

@section('content')
<div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Dokumen</h4>
        <div class="row">
          <div class="col-md-12">
            <div class="card rounded-4">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="card-title">Verifikasi Dokumen {{$user->name}}</div>
                  <div class="d-flex">
                    <form action="{{ route('admin.peserta.verify_process',$user->id) }}" method="post">
                      @csrf
                      @method('PUT')
                      <button type="button" onclick="confirm('Yakin untuk memverifikasi dokumen?') ? setAttribute('type', 'submit') : ''" class="btn btn-primary me-2 rounded-4">Verify &check;</button>
                    </form>
                    <a href="{{route('admin.peserta.index')}}" class="btn btn-outline-primary rounded-4">Back</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <h5>Data Pribadi</h5>
                    <div class="mb-2">
                      <label for="">Nama Lengkap : </label>
                      <input type="text" disabled value="{{$user->name}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Nomor HP : </label>
                      <input type="text" disabled value="{{$user->nomor}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Jenis Kelamin : </label>
                      <input type="text" disabled value="{{$user->jenis_kelamin}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Tanggal Lahir : </label>
                      <input type="text" disabled value="{{$user->tanggal_lahir}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Tempat Lahir : </label>
                      <input type="text" disabled value="{{$user->student->birthplace}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">NIK : </label>
                      <input type="text" disabled value="{{$user->student->nik}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">NISN : </label>
                      <input type="text" disabled value="{{$user->student->nisn}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Asal Sekolah : </label>
                      <input type="text" disabled value="{{$user->student->old_school}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Pendidikan Terakhir : </label>
                      <input type="text" disabled value="{{$user->student->last_graduate}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Organisasi Yang Pernah Diikuti : </label>
                      <textarea type="text" disabled class="form-control rounded-4">{{$user->student->organization_exp}}</textarea>
                    </div>
                    <div class="mb-2">
                      <label for="">Alamat : </label>
                      <input type="text" disabled value="{{$user->student->address}}" class="form-control rounded-4">
                    </div>
                    <h5 class="mt-3">Data Orang Tua</h5>
                    <div class="mb-2">
                      <label for="">Nama Ayah : </label>
                      <input type="text" disabled value="{{$user->parents->father_name}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Pekerjaan Ayah : </label>
                      <input type="text" disabled value="{{$user->parents->father_job}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Nama Ibu : </label>
                      <input type="text" disabled value="{{$user->parents->mother_name}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Pekerjaan Ibu : </label>
                      <input type="text" disabled value="{{$user->parents->mother_job}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Penghasilan Keluarga perbulan : </label>
                      @php
                        $earning = "";
                        if ($user->parents->mother_earning == 'A') {
                          $earning .= "Kurang dari 1.000.000";
                        } elseif ($user->parents->mother_earning == 'B') {
                          $earning .= "1.000.000 - 5.000.000";
                        } elseif ($user->parents->mother_earning == 'C') {
                          $earning .= "5.000.000 - 10.000.000";
                        } else {
                          $earning .= "Lebih dari 10.000.000";
                        }
                      @endphp
                      <input type="text" disabled value="{{ $earning }} Rupiah" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Anak Ke Berapa : </label>
                      <input type="text" disabled value="{{$user->parents->child_no}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Dari Berapa Soudara : </label>
                      <input type="text" disabled value="{{$user->parents->no_of_sibling}}" class="form-control rounded-4">
                    </div>
                  </div>
                  <style>
                    .scrollable-docs {
                      display: flex;
                      flex-direction: column;
                      overflow-y: scroll;
                      height: 50rem;
                      scroll-snap-type: y mandatory;

                      scroll-behavior: smooth;
                      -webkit-overflow-scrolling: touch;
                    }

                    .scrollable-docs > div.mb-2 {
                      scroll-snap-align: start;
                    }

                    .scrollable-docs object {
                      height: 48rem;
                    }
                  </style>
                  <div class="col-6 scrollable-docs">
                    <div class="mb-2">
                      <label class="form-label fs-6 mb-2">
                        Kartu Keluarga
                        <a href="{{ asset('storage/' . $user->document->kk) }}" target="_blank" class="badge badge-info border-0 ms-2">Show <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                      </label>
                      <object class="rounded-4" data="{{ asset('storage/' . $user->document->kk) }}" type="application/pdf" width="100%">
                        <p>Maaf, browser Anda tidak mendukung tampilan PDF. Anda bisa <a href="{{ asset('storage/' . $user->document->kk) }}">mengunduh file PDF</a> sebagai alternatif.</p>
                      </object>
                    </div>
                    <div class="mb-2">
                      <label class="form-label fs-6 mb-2">
                        Ijazah
                        <a href="{{ asset('storage/' . $user->document->ijazah) }}" target="_blank" class="badge badge-info border-0 ms-2">Show <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                      </label>
                      <object class="rounded-4" data="{{ asset('storage/' . $user->document->ijazah) }}" type="application/pdf" width="100%">
                        <p>Maaf, browser Anda tidak mendukung tampilan PDF. Anda bisa <a href="{{ asset('storage/' . $user->document->kk) }}">mengunduh file PDF</a> sebagai alternatif.</p>
                      </object>
                    </div>
                    <div class="mb-2">
                      <label class="form-label fs-6 mb-2">
                        Akta Kelahiran
                        <a href="{{ asset('storage/' . $user->document->akta) }}" target="_blank" class="badge badge-info border-0 ms-2">Show <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                      </label>
                      <object class="rounded-4" data="{{ asset('storage/' . $user->document->akta) }}" type="application/pdf" width="100%">
                        <p>Maaf, browser Anda tidak mendukung tampilan PDF. Anda bisa <a href="{{ asset('storage/' . $user->document->kk) }}">mengunduh file PDF</a> sebagai alternatif.</p>
                      </object>
                    </div>
                    <div class="mb-2">
                      <label class="form-label fs-6 mb-2">
                        Rapor
                        <a href="{{ asset('storage/' . $user->document->rapor) }}" target="_blank" class="badge badge-info border-0 ms-2">Show <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                      </label>
                      <object class="rounded-4" data="{{ asset('storage/' . $user->document->rapor) }}" type="application/pdf" width="100%">
                        <p>Maaf, browser Anda tidak mendukung tampilan PDF. Anda bisa <a href="{{ asset('storage/' . $user->document->kk) }}">mengunduh file PDF</a> sebagai alternatif.</p>
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
  </div>
@endsection