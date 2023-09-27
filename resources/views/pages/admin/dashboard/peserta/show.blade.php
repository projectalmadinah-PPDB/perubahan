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
                  <div class="d-flex">
                    <a href="{{route('admin.pendaftar.export_private',$pendaftaran->id)}}" class="btn btn-primary me-2 text-white">Export Data</a>
                    <a href="{{route('admin.peserta.index')}}" class="btn btn-primary float-end text-white">Back</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <div class="col-6">
                    <h5>Data Pribadi</h5>
                    <div class="mb-2">
                      <label for="">Nama Lengkap : </label>
                      <input type="text" disabled value="{{$pendaftaran->name}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">Nomor Hp : </label>
                      <input type="text" disabled value="{{$pendaftaran->nomor}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">Jenis Kelamin : </label>
                      <input type="text" disabled value="{{$pendaftaran->jenis_kelamin}}" class="form-control">
                    </div>
                    <div>
                      <label for="">Tanggal Lahir : </label>
                      <input type="text" disabled value="{{$pendaftaran->tanggal_lahir}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">Tempat Lahir : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->birthplace}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">NIK : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->nik}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">NISN : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->nisn}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">Hobby : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->hobby}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">Cita - Cita : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->ambition}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">Asal Sekolah : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->old_school}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">Pendidikan Terakhir : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->last_graduate}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">Organisasi Yang Pernah Diikuti : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->organization_exp}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">Alamat : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->address}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">Status : </label>
                      <input type="text" disabled value="
                      @if ($pendaftaran->student->status == 'tidak')
                        Belum Di Cek
                      @elseif($pendaftaran->student->status == 'gagal')
                        Gagal
                      @else
                        Lolos
                      @endif
                      " class="form-control">
                    </div>
                  </div>
                  <div class="col-6">
                    <h5>Data Org Tua</h5>
                    <div class="mb-2">
                      <label for="">Nama Ayah : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->father_name}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">Nomor Ayah : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->father_phone}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">Nama Ibu : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->mother_name}}" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label for="">Nomor Ibu : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->mother_phone}}" class="form-control">
                    </div>
                    <div>
                      <label for="">Pekerjaan Ayah : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->father_job}}" class="form-control">
                    </div>
                    <div>
                      <label for="">Pekerjaan Ibu : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->mother_job}}" class="form-control">
                    </div>
                    <div>
                      <label for="">Penghasilan Ayah Sebulan : </label>
                      <select name="" id="" class="form-select">
                        <option value="">@if ($pendaftaran->parents->parent_earning == 'A')
                          Kurang dari 1.000.000
                          @elseif($pendaftaran->parents->parent_earning == 'B')
                          1.000.000 - 5.000.000
                          @elseif($pendaftaran->parents->parent_earning == 'C')
                          5.000.000 - 10.000.000
                          @else
                          Lebih dari 10.000.000
                        @endif
                          Rupiah</option>
                      </select>
                    </div>
                    <div>
                      <label for="">Anak Ke Berapa : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->child_no}}" class="form-control">
                    </div>
                    <div>
                      <label for="">Dari Berapa Soudara : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->no_of_sibling}}" class="form-control">
                    </div>
                    @if (!$pendaftaran->document)

                    @else
                    <div>
                      <h3>Document</h3>
                      <div class="">
                        <label for="">Document Kartu Keluarga</label>
                        <a href="{{ asset('storage/' . $pendaftaran->document->kk) }}" target="_blank" class="py-0.5 px-2 rounded-full text-xs bg-sekunder italic hover:bg-sekunder/50 duration-200">
                          show <i class="bi bi-box-arrow-up-right ms-0.5 font-bold"></i>
                      </a>
                      <input type="text" value="{{$pendaftaran->document->kk}}" class="form-control" disabled>
                      </div>
                      <div class="">
                        <label for="">Document Kartu Akta Kelahiran</label>
                        <a href="{{ asset('storage/' . $pendaftaran->document->akta) }}" target="_blank" class="py-0.5 px-2 rounded-full text-xs bg-sekunder italic hover:bg-sekunder/50 duration-200">
                          show <i class="bi bi-box-arrow-up-right ms-0.5 font-bold"></i>
                      </a>
                      <input type="text" value="{{$pendaftaran->document->akta}}" class="form-control" disabled>
                      </div>
                      <div class="">
                        <label for="">Document Kartu Rapor</label>
                        <a href="{{ asset('storage/' . $pendaftaran->document->rapor) }}" target="_blank" class="py-0.5 px-2 rounded-full text-xs bg-sekunder italic hover:bg-sekunder/50 duration-200">
                          show <i class="bi bi-box-arrow-up-right ms-0.5 font-bold"></i>
                      </a>
                      <input type="text" value="{{$pendaftaran->document->rapor}}" class="form-control" disabled>
                      </div>
                      <div class="">
                        <label for="">Document Kartu Ijazah</label>
                        <a href="{{ asset('storage/' . $pendaftaran->document->ijazah) }}" target="_blank" class="py-0.5 px-2 rounded-full text-xs bg-sekunder italic hover:bg-sekunder/50 duration-200">
                          show <i class="bi bi-box-arrow-up-right ms-0.5 font-bold"></i>
                      </a>
                      <input type="text" value="{{$pendaftaran->document->ijazah}}" class="form-control" disabled>
                      </div>
                    </div>
                    @endif
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