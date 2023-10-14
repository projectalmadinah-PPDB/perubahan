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
                    <a href="{{route('admin.pendaftar.export_private',$pendaftaran->id)}}" class="btn rounded-4 btn-primary me-2">Export Data</a>
                    @if ($pendaftaran->status == 'Belum' && $pendaftaran->document)
                    <a href="{{route('admin.peserta.document',$pendaftaran->id)}}" title="verifikasi dokumen" class="btn rounded-4 btn-outline-warning me-2">Verify</a>
                    @endif
                    <a href="{{route('admin.peserta.index')}}" class="btn rounded-4 btn-outline-primary float-end">Back</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <div class="col-6">
                    <h5>Data Pribadi</h5>
                    <div class="mb-2">
                      <label for="">Nama Lengkap : </label>
                      <input type="text" disabled value="{{$pendaftaran->name}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Nomor Hp : </label>
                      <input type="text" disabled value="{{$pendaftaran->nomor}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Jenis Kelamin : </label>
                      <input type="text" disabled value="{{$pendaftaran->jenis_kelamin}}" class="form-control rounded-4">
                    </div>
                    <div>
                      <label for="">Tanggal Lahir : </label>
                      <input type="text" disabled value="{{$pendaftaran->tanggal_lahir}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Tempat Lahir : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->birthplace}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">NIK : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->nik}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">NISN : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->nisn}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Hobby : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->hobby}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Cita - Cita : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->ambition}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Asal Sekolah : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->old_school}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Pendidikan Terakhir : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->last_graduate}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Organisasi Yang Pernah Diikuti : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->organization_exp}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Alamat : </label>
                      <input type="text" disabled value="{{$pendaftaran->student->address}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Status : </label>
                      <input type="text" disabled value="
                      @if ($pendaftaran->student->status == 'Belum')
                        Proses Isi Formulir
                      @elseif ($pendaftaran->student->status == 'Wawancara')
                        Proses Wawancara
                      @elseif($pendaftaran->student->status == 'Gagal')
                        Gagal
                      @else
                        Lolos
                      @endif
                      " class="form-control rounded-4">
                    </div>
                  </div>
                  <div class="col-6">
                    <h5>Data Orang Tua</h5>
                    <div class="mb-2">
                      <label for="">Nama Ayah : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->father_name}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Nomor Ayah : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->father_phone}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Nama Ibu : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->mother_name}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Nomor Ibu : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->mother_phone}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Pekerjaan Ayah : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->father_job}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Pekerjaan Ibu : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->mother_job}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Penghasilan Keluarga perbulan : </label>
                      @php
                        $earning = "";
                        if ($pendaftaran->parents->mother_earning == 'A') {
                          $earning .= "Kurang dari 1.000.000";
                        } elseif ($pendaftaran->parents->mother_earning == 'B') {
                          $earning .= "1.000.000 - 5.000.000";
                        } elseif ($pendaftaran->parents->mother_earning == 'C') {
                          $earning .= "5.000.000 - 10.000.000";
                        } else {
                          $earning .= "Lebih dari 10.000.000";
                        }
                      @endphp
                      <input type="text" disabled value="{{ $earning }} Rupiah" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Anak Ke Berapa : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->child_no}}" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="">Dari Berapa Soudara : </label>
                      <input type="text" disabled value="{{$pendaftaran->parents->no_of_sibling}}" class="form-control rounded-4">
                    </div>
                    @if (!$pendaftaran->document)
                    @else
                    <div class="mb-2">
                      <h3>Document</h3>
                      <div class="mb-2">
                        <label for="">Document Kartu Keluarga</label>
                        <a href="{{ asset('storage/' . $pendaftaran->document->kk) }}" target="_blank" class="py-0.5 px-2 rounded-full text-xs bg-sekunder italic hover:bg-sekunder/50 duration-200">
                          show <i class="bi bi-box-arrow-up-right ms-0.5 font-bold"></i>
                        </a>
                        <input type="text" value="{{$pendaftaran->document->kk}}" class="form-control rounded-4" disabled>
                      </div>
                      <div class="mb-2">
                        <label for="">Document Kartu Akta Kelahiran</label>
                        <a href="{{ asset('storage/' . $pendaftaran->document->akta) }}" target="_blank" class="py-0.5 px-2 rounded-full text-xs bg-sekunder italic hover:bg-sekunder/50 duration-200">
                          show <i class="bi bi-box-arrow-up-right ms-0.5 font-bold"></i>
                        </a>
                        <input type="text" value="{{$pendaftaran->document->akta}}" class="form-control rounded-4" disabled>
                      </div>
                      <div class="mb-2">
                        <label for="">Document Kartu Rapor</label>
                        <a href="{{ asset('storage/' . $pendaftaran->document->rapor) }}" target="_blank" class="py-0.5 px-2 rounded-full text-xs bg-sekunder italic hover:bg-sekunder/50 duration-200">
                          show <i class="bi bi-box-arrow-up-right ms-0.5 font-bold"></i>
                        </a>
                        <input type="text" value="{{$pendaftaran->document->rapor}}" class="form-control rounded-4" disabled>
                      </div>
                      <div class="mb-2">
                        <label for="">Document Kartu Ijazah</label>
                        <a href="{{ asset('storage/' . $pendaftaran->document->ijazah) }}" target="_blank" class="py-0.5 px-2 rounded-full text-xs bg-sekunder italic hover:bg-sekunder/50 duration-200">
                          show <i class="bi bi-box-arrow-up-right ms-0.5 font-bold"></i>
                        </a>
                        <input type="text" value="{{$pendaftaran->document->ijazah}}" class="form-control rounded-4" disabled>
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