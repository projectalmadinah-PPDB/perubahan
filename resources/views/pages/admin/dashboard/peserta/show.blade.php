@extends('pages.admin.dashboard.layouts.parent')

@section('title','Biodata Pribadi')

@section('content')
<div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Biodata</h4>
        <div class="row">
          <div class="col-md-12">
            
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="card-title">Detail Biodata {{$pendaftaran->name}}</div>
                  <a href="{{route('admin.peserta.index')}}" class="btn btn-primary float-end text-white">Back</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <div class="col-6">
                    <h5>Data Pribadi</h5>
                    <div class="mb-2">
                      <label for="">Nama Lengkap : </label>
                      <strong>{{$pendaftaran->user->name}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">Nomor Hp : </label>
                      <strong>{{$pendaftaran->nomor}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">Jenis Kelamin : </label>
                      <strong>{{$pendaftaran->jenis_kelamin}}</strong>
                    </div>
                    <div>
                      <label for="">Tanggal Lahir : </label>
                      <strong>{{$pendaftaran->tanggal_lahir}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">Tempat Lahir : </label>
                      <strong>{{$pendaftaran->birthplace}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">NIK : </label>
                      <strong>{{$pendaftaran->nik}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">NISN : </label>
                      <strong>{{$pendaftaran->nisn}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">Hobby : </label>
                      <strong>{{$pendaftaran->hobby}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">Cita - Cita : </label>
                      <strong>{{$pendaftaran->ambition}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">Asal Sekolah : </label>
                      <strong>{{$pendaftaran->old_school}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">Pendidikan Terakhir : </label>
                      <strong>{{$pendaftaran->last_graduate}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">Organisasi Yang Pernah Diikuti : </label>
                      <strong>{{$pendaftaran->organization_exp}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">Alamat : </label>
                      <strong>{{$pendaftaran->address}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">Status : </label>
                      <strong>
                      @if ($pendaftaran->status == 'tidak')
                        Belum Di Cek
                      @elseif($pendaftaran->status == 'gagal')
                        Gagal
                      @else
                        Lolos
                      @endif
                    </strong>
                    </div>
                  </div>
                  <div class="col-6">
                    <h5>Data Org Tua</h5>
                    <div class="mb-2">
                      <label for="">Nama Ayah : </label>
                      <strong>{{$pendaftaran->father_name}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">Nomor Ayah : </label>
                      <strong>{{$pendaftaran->father_phone}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">Nama Ibu : </label>
                      <strong>{{$pendaftaran->mother_name}}</strong>
                    </div>
                    <div class="mb-2">
                      <label for="">Nomor Ibu : </label>
                      <strong>{{$pendaftaran->mother_phone}}</strong>
                    </div>
                    <div>
                      <label for="">Pekerjaan Ayah : </label>
                      <strong>{{$pendaftaran->father_job}}</strong>
                    </div>
                    <div>
                      <label for="">Pekerjaan Ibu : </label>
                      <strong>{{$pendaftaran->mother_job}}</strong>
                    </div>
                    <div>
                      <label for="">Penghasilan Ayah Sebulan : </label>
                      <strong>
                        @if ($pendaftaran->parent_earning == 'A')
                          Kurang dari 1.000.000
                          @elseif($pendaftaran->parent_earning == 'B')
                          1.000.000 - 5.000.000
                          @elseif($pendaftaran->parent_earning == 'C')
                          5.000.000 - 10.000.000
                          @else
                          Lebih dari 10.000.000
                        @endif
                          Rupiah
                      </strong>
                    </div>
                    <div>
                      <label for="">Anak Ke Berapa : </label>
                      <strong>{{$pendaftaran->child_no}}</strong>
                    </div>
                    <div>
                      <label for="">Dari Berapa Soudara : </label>
                      <strong>{{$pendaftaran->no_of_sibling}}</strong>
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