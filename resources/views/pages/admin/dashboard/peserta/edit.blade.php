@extends('pages.admin.dashboard.layouts.parent')

@section('title' , 'Edit Biodata')

@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Pendaftaran</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Pendaftaran Edit "{{$data->name}}"</div>
            </div>
            <form action="{{route('admin.peserta.update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="Title">Nama Lengkap</label>
                            <input type="text" class="form-control"  name="name" placeholder="Enter Name" value="{{$data->name}}">
                          </div>
                          <div class="form-group">
                            <label for="nomor">NO HP</label>
                            <input name="nomor" class="form-control" type="text" value="{{$data->nomor}}">
                          </div>
                          <div class="form-group">
                            <label for="Title">Nomor Induk Kependudukan</label>
                            <input type="text" class="form-control"  name="nik" placeholder="Enter Name" value="{{$data->student->nik}}">
                          </div>
                          <div class="form-group">
                            <label for="Title">Nomor Induk Kependidikan Nasional</label>
                            <input type="text" class="form-control"  name="nisn" placeholder="Enter Name" value="{{$data->student->nisn}}">
                          </div>
                          <div class="form-group">
                            <label for="email">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="{{$data->tanggal_lahir}}">
                          </div>
                          <div class="form-group">
                            <label for="email">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-select">
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki" {{$data->jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}}>Laki</option>
                                <option value="Perempuan" {{$data->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                            </select>
                          </div>
                          
                          <div class="form-group">
                            <label for="email">Status</label>
                            <select name="status" id="" class="form-select">
                                <option disabled selected>Pilih Status</option>
                                <option value="lolos" {{$data->student->status == 'lolos' ? 'selected' : ''}}>Lolos</option>
                                <option value="gagal" {{$data->student->status == 'gagal' ? 'selected' : ''}}>Gagal</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="Title">Tempat Lahir</label>
                              <input type="text" class="form-control"  name="birthplace" placeholder="Enter Name" value="{{$data->student->birthplace}}">
                            </div>
                            <div class="form-group">
                              <label for="Title">Hobby</label>
                              <input type="text" class="form-control"  name="hobby" placeholder="Enter Name" value="{{$data->student->hobby}}">
                            </div>
                            <div class="form-group">
                              <label for="Title">Cita - Cita</label>
                              <input type="text" class="form-control"  name="ambition" placeholder="Enter Name" value="{{$data->student->ambition}}">
                            </div>
                            <div class="form-group">
                              <label for="Title">Pendidikan Terakhir</label>
                              <input type="text" class="form-control"  name="last_graduate" placeholder="Enter Name" value="{{$data->student->last_graduate}}">
                            </div>
                            <div class="form-group">
                              <label for="Title">Asal Sekolah</label>
                              <input type="text" class="form-control"  name="old_school" placeholder="Enter Name" value="{{$data->student->old_school}}">
                            </div>
                            <div class="form-group">
                              <label for="Title">Organisasi Yang Sudah Diikuti</label>
                              <input type="text" class="form-control"  name="organization_exp" placeholder="Enter Name" value="{{$data->student->organization_exp}}">
                            </div>
                            <div class="form-group">
                              <label for="email">Alamat</label>
                              <textarea name="address" id="" class="form-control" rows="5">
                                {{$data->student->address}}
                              </textarea>
                            </div>
                          </div>
                      </div>
                      @if(!$data->parents)
                      @else
                      <div class="col-md-6">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="Title">Nama Ayah</label>
                            <input type="text" class="form-control"  name="father_name" placeholder="Enter Name" value="{{$data->parents->father_name}}">
                          </div>
                          <div class="form-group">
                            <label for="nomor">Nomor Ayah</label>
                            <input name="father_phone" class="form-control" type="text" value="{{$data->parents->father_phone}}">
                          </div>
                          <div class="form-group">
                            <label for="nomor">Nomor Ibu</label>
                            <input name="mother_phone" class="form-control" type="text" value="{{$data->parents->mother_phone}}">
                          </div>
                          <div class="form-group">
                            <label for="email">Nama Ibu</label>
                            <input name="mother_name" class="form-control" type="text" value="{{$data->parents->mother_name}}">
                          </div>
                          <div class="form-group">
                            <label for="email">Pekerjaan Ayah</label>
                            <input type="text" class="form-control" name="father_job" value="{{$data->parents->father_job}}">
                          </div>
                          <div class="form-group">
                            <label for="email">Pekerjaan Ibu</label>
                            <input type="text" class="form-control" name="mother_job" value="{{$data->parents->mother_job}}">
                          </div>
                          <div class="form-group">
                            <label for="" class="text-sm text-slate-200">Penghasilan Orang Tua</label>
                            <select name="parent_earning"
                                class="form-select">
                                <option class="text-slate-300" hidden disabled selected>- Pilih penghasilan orangtuamu -</option>
                                <option class="text-primer" value="A" {{$data->parents->parent_earning == 'A' ? 'selected' : ''}}>Kurang dari 1.000.000</option>
                                <option class="text-primer" value="B" {{$data->parents->parent_earning == 'B' ? 'selected' : ''}}>1.000.000 - 5.000.000</option>
                                <option class="text-primer" value="C"  {{$data->parents->parent_earning == 'C' ? 'selected' : ''}}>5.000.000 - 10.000.000</option>
                                <option class="text-primer" value="D"  {{$data->parents->parent_earning == 'D' ? 'selected' : ''}}>Lebih dari 10.000.000</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="email">Anak Ke Berapa</label>
                            <input type="text" class="form-control" name="child_no" value="{{$data->parents->child_no}}">
                          </div>
                          <div class="form-group">
                            <label for="email">Dari Berapa Soudara</label>
                            <input type="text" class="form-control" name="no_of_sibling" value="{{$data->parents->no_of_sibling}}">
                          </div>
                        </div>
                      </div>
                      @endif
                      {{-- @if($data->document)
                      <div class="col-md-12">
                        <div class="card-body d-flex flex-wrap">
                          <div class="form-group" style="width: 300px">
                            <label for="Title">Kartu Keluarga</label>
                            <input onchange="readURL2()" type="file" name="kk" id="inputKk" 
                                    class="form-control"
                                accept="application/pdf" >
                            <object id="outputKk" 
                                    class="bg-slate-200 mt-2 w-full rounded-lg me-2 shadow-inner" height="400" 
                                type="application/pdf" data="{{ asset('storage/' . $data->document->kk) }}"></object>
                          </div>
                          <div class="form-group" style="width: 300px">
                            <label for="nomor">Ijazah</label>
                            <input onchange="readURL3()" type="file" name="ijazah" id="inputIjazah" 
                                    class="form-control" 
                                accept="application/pdf">
                            <object id="outputIjazah" 
                                    class="bg-slate-200 dark:bg-slate-800 w-full ms-2 mt-2 rounded-[30px] shadow-inner" height="400" 
                                type="application/pdf" data="{{ asset('storage/' . $data->document->ijazah) }}"></object>
                          </div>
                          <div class="form-group" style="width: 300px">
                            <label for="email">Akta</label>
                            <input onchange="readURL1()" type="file" name="akta" id="inputAkte" 
                                    class="form-control" 
                                accept="application/pdf">
                            <object id="outputAkte" 
                                    class="bg-slate-200 dark:bg-slate-800 w-full ms-3 mt-2 rounded-[30px] shadow-inner" height="400" 
                                type="application/pdf" data="{{ asset('storage/' . $data->document->akta) }}"></object>
                          </div>
                          <div class="form-group" style="width: 300px">
                            <label for="email">Rapor</label>
                            <input onchange="readURL4()" type="file" name="rapor" id="inputRapor" 
                                    class="form-control" 
                                accept="application/pdf">
                            <object id="outputRapor" 
                                    class="bg-slate-200 dark:bg-slate-800 w-full mt-2 rounded-[30px] shadow-inner" height="400" 
                                type="application/pdf" data="{{ asset('storage/' . $data->document->rapor) }}"></object>
                          </div>
                        </div>
                      </div> 
                      @else
                      <div class="col-md-12">
                        <div class="card-body d-flex">
                          <div class="form-group">
                            <label for="Title">Kartu Keluarga</label>
                            <input disabled onchange="readURL2()" type="file" name="kk" id="inputKk" 
                                    class="form-control"
                                accept="application/pdf" >
                            <p>Tidak Ada Kartu Keluarga</p>
                          </div>
                          <div class="form-group">
                            <label for="nomor">Ijazah</label>
                            <input disabled onchange="readURL3()" type="file" name="ijazah" id="inputIjazah" 
                                    class="form-control" 
                                accept="application/pdf">
                                <p>Tidak Ada Kartu Ijazah</p>
                          </div>
                          <div class="form-group">
                            <label for="email">Akta</label>
                            <input disabled onchange="readURL1()" type="file" name="akta" id="inputAkte" 
                                    class="form-control" 
                                accept="application/pdf">
                                <p>Tidak Ada Kartu Akta</p>
                          </div>
                          <div class="form-group">
                            <label for="email">Rapor</label>
                            <input disabled onchange="readURL1()" type="file" name="akta" id="inputAkte" 
                                    class="form-control" 
                                accept="application/pdf">
                                <p>Tidak Ada Rapor</p>
                          </div>
                        </div>
                      </div> 
                      @endif --}}
                    <div class="card-action">
                      <button class="btn btn-success" type="submit">Submit</button>
                      <a href="{{route('admin.peserta.index')}}" class="btn btn-warning" type="button">Back</a>
                    </div>  
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
@endsection

@push('add-script')
  <script>
                              
    // preview akte
    function readURL1() {
        const pdfInput = document.getElementById('inputAkte');
        const pdfPreview = document.getElementById('outputAkte');
        
        // Remove previous data
        pdfPreview.removeAttribute('data');
        
        const file = pdfInput.files[0];
        if (file) {
            pdfPreview.setAttribute('data', URL.createObjectURL(file));
        }
    }

    // preview kartu keluarga
    function readURL2() {
        const pdfInput = document.getElementById('inputKk');
        const pdfPreview = document.getElementById('outputKk');
        
        // Remove previous data
        pdfPreview.removeAttribute('data');
        
        const file = pdfInput.files[0];
        if (file) {
            pdfPreview.setAttribute('data', URL.createObjectURL(file));
        }
    }

    // preview ijazah
    function readURL3() {
        const pdfInput = document.getElementById('inputIjazah');
        const pdfPreview = document.getElementById('outputIjazah');
        
        // Remove previous data
        pdfPreview.removeAttribute('data');
        
        const file = pdfInput.files[0];
        if (file) {
            pdfPreview.setAttribute('data', URL.createObjectURL(file));
        }
    }

    function readURL4() {
        const pdfInput = document.getElementById('inputRapor');
        const pdfPreview = document.getElementById('outputRapor');
        
        // Remove previous data
        pdfPreview.removeAttribute('data');
        
        const file = pdfInput.files[0];
        if (file) {
            pdfPreview.setAttribute('data', URL.createObjectURL(file));
        }
    }

  </script>
@endpush