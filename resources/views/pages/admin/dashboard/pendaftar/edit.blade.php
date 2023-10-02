@extends('pages.admin.dashboard.layouts.parent')

@section('title' , 'Edit Biodata')

@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Forms</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Base Form Control</div>
            </div>
            <form action="{{route('admin.pendaftar.update',$biodata->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="Title">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" placeholder="Enter Name" value="{{$biodata->name}}">
                            @error('name')
                              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{$message}}
                              </div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="nomor">NO HP</label>
                            <input name="nomor" class="form-control @error('nomor') is-invalid @enderror" type="text" value="{{$biodata->nomor}}">
                            @error('nomor')
                              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{$message}}
                              </div>
                            @enderror
                          </div>
                          
                          <div class="form-group">
                            <label for="email">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{$biodata->tanggal_lahir}}">
                            @error('tanggal_lahir')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="email">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki" {{$biodata->jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}}>Laki</option>
                                <option value="Perempuan" {{$biodata->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          @if ($biodata->student)
                          <div class="form-group">
                            <label for="Title">Nomor Induk Kependidikan Nasional</label>
                            <input type="text" class="form-control @error('nisn') is-invalid @enderror"  name="nisn" placeholder="Enter Name" value="{{$biodata->student->nisn}}">
                            @error('nisn')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="Title">Nomor Induk Kependudukan</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror"  name="nik" placeholder="Enter Name" value="{{$biodata->student->nik}}">
                            @error('nik')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="Title">Tempat Lahir</label>
                            <input type="text" class="form-control @error('birthplace') is-invalid @enderror"  name="birthplace" placeholder="Enter Name" value="{{$biodata->student->birthplace}}">
                            @error('birthplace')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="Title">Hobby</label>
                            <input type="text" class="form-control @error('hobby') is-invalid @enderror"  name="hobby" placeholder="Enter Name" value="{{$biodata->student->hobby}}">
                            @error('hobby')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="Title">Cita - Cita</label>
                            <input type="text" class="form-control @error('ambition') is-invalid @enderror"  name="ambition" placeholder="Enter Name" value="{{$biodata->student->ambition}}">
                            @error('ambition')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="Title">Pendidikan Terakhir</label>
                            <input type="text" class="form-control @error('last_graduate') is-invalid @enderror"  name="last_graduate" placeholder="Enter Name" value="{{$biodata->student->last_graduate}}">
                            @error('last_graduate')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="Title">Asal Sekolah</label>
                            <input type="text" class="form-control @error('old_school') is-invalid @enderror"  name="old_school" placeholder="Enter Name" value="{{$biodata->student->old_school}}">
                            @error('old_school')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="Title">Organisasi Yang Sudah Diikuti</label>
                            <input type="text" class="form-control @error('organization_exp') is-invalid @enderror"  name="organization_exp" placeholder="Enter Name" value="{{$biodata->student->organization_exp}}">
                            @error('organization_exp')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="email">Alamat</label>
                            <textarea name="address" id="" class="form-control @error('address') is-invalid @enderror" rows="5">
                              {{$biodata->student->address}}
                            </textarea>
                            @error('address')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          @endif
                          </div>
                      </div>
                      @if(!$biodata->parents)
                      @else
                      <div class="col-md-6">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="Title">Nama Ayah</label>
                            <input type="text" class="form-control @error('father_name') is-invalid @enderror"  name="father_name" placeholder="Enter Name" value="{{$biodata->parents->father_name}}">
                            @error('father_name')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="nomor">Nomor Ayah</label>
                            <input name="father_phone" class="form-control @error('father_phone') is-invalid @enderror" type="text" value="{{$biodata->parents->father_phone}}">
                            @error('father_phone')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="nomor">Nomor Ibu</label>
                            <input name="mother_phone" class="form-control @error('mother_phone') is-invalid @enderror" type="text" value="{{$biodata->parents->mother_phone}}">
                            @error('mother_phone')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="email">Nama Ibu</label>
                            <input name="mother_name" class="form-control @error('mother_name') is-invalid @enderror" type="text" value="{{$biodata->parents->mother_name}}">
                            @error('mother_name')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="email">Pekerjaan Ayah</label>
                            <input type="text" class="form-control @error('father_job') is-invalid @enderror" name="father_job" value="{{$biodata->parents->father_job}}">
                            @error('father_job')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="email">Pekerjaan Ibu</label>
                            <input type="text" class="form-control @error('mother_job') is-invalid @enderror" name="mother_job" value="{{$biodata->parents->mother_job}}">
                            @error('mother_job')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="" class="text-sm text-slate-200">Penghasilan Orang Tua</label>
                            <select name="parent_earning"
                                class="form-select @error('parent_earning') is-invalid @enderror">
                                <option class="text-slate-300" hidden disabled selected>- Pilih penghasilan orangtuamu -</option>
                                <option class="text-primer" value="A" {{$biodata->parents->parent_earning == 'A' ? 'selected' : ''}}>Kurang dari 1.000.000</option>
                                <option class="text-primer" value="B" {{$biodata->parents->parent_earning == 'B' ? 'selected' : ''}}>1.000.000 - 5.000.000</option>
                                <option class="text-primer" value="C"  {{$biodata->parents->parent_earning == 'C' ? 'selected' : ''}}>5.000.000 - 10.000.000</option>
                                <option class="text-primer" value="D"  {{$biodata->parents->parent_earning == 'D' ? 'selected' : ''}}>Lebih dari 10.000.000</option>
                            </select>
                            @error('parent_earning')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="email">Anak Ke Berapa</label>
                            <input type="text" class="form-control @error('child_no') is-invalid @enderror" name="child_no" value="{{$biodata->parents->child_no}}">
                            @error('child_no')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="email">Dari Berapa Soudara</label>
                            <input type="text" class="form-control @error('no_of_sibling') is-invalid @enderror" name="no_of_sibling" value="{{$biodata->parents->no_of_sibling}}">
                            @error('no_of_sibling')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                          </div>
                        </div>
                      </div>
                      @endif
                      @if($biodata->document)
                      <div class="col-md-12">
                        <div class="card-body d-flex flex-wrap">
                          <div class="form-group" style="width: 300px">
                            <label for="Title">Kartu Keluarga</label>
                            <input onchange="readURL2()" type="file" name="kk" id="inputKk" 
                                    class="form-control @error('kk') is-invalid @enderror"
                                accept="application/pdf" >
                                @error('kk')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                  {{$message}}
                                </div>
                              @enderror
                            <object id="outputKk" 
                                    class="bg-slate-200 mt-2 w-full rounded-lg me-2 shadow-inner" height="400" 
                                type="application/pdf" data="{{ asset('storage/' . $biodata->document->kk) }}"></object>
                          </div>
                          <div class="form-group" style="width: 300px">
                            <label for="nomor">Ijazah</label>
                            <input onchange="readURL3()" type="file" name="ijazah" id="inputIjazah" 
                                    class="form-control @error('ijazah') is-invalid @enderror" 
                                accept="application/pdf">
                                @error('ijazah')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                  {{$message}}
                                </div>
                              @enderror
                            <object id="outputIjazah" 
                                    class="bg-slate-200 dark:bg-slate-800 w-full ms-2 mt-2 rounded-[30px] shadow-inner" height="400" 
                                type="application/pdf" data="{{ asset('storage/' . $biodata->document->ijazah) }}"></object>
                          </div>
                          <div class="form-group" style="width: 300px">
                            <label for="email">Akta</label>
                            <input onchange="readURL1()" type="file" name="akta" id="inputAkte" 
                                    class="form-control @error('akta') is-invalid @enderror" 
                                accept="application/pdf">
                                @error('akta')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                  {{$message}}
                                </div>
                              @enderror
                            <object id="outputAkte" 
                                    class="bg-slate-200 dark:bg-slate-800 w-full ms-3 mt-2 rounded-[30px] shadow-inner" height="400" 
                                type="application/pdf" data="{{ asset('storage/' . $biodata->document->akta) }}"></object>
                          </div>
                          <div class="form-group" style="width: 300px">
                            <label for="email">Rapor</label>
                            <input onchange="readURL4()" type="file" name="rapor" id="inputRapor" 
                                    class="form-control @error('rapor') is-invalid @enderror" 
                                accept="application/pdf">
                                @error('rapor')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                  {{$message}}
                                </div>
                              @enderror
                            <object id="outputRapor" 
                                    class="bg-slate-200 dark:bg-slate-800 w-full mt-2 rounded-[30px] shadow-inner" height="400" 
                                type="application/pdf" data="{{ asset('storage/' . $biodata->document->rapor) }}"></object>
                          </div>
                        </div>
                      </div> 
                      @else
                      {{-- <div class="col-md-12">
                        <div class="card-body d-flex">
                          <div class="form-group">
                            <label for="Title">Kartu Keluarga</label>
                            <input disabled onchange="readURL2()" type="file" name="kk" id="inputKk" 
                                    class="form-control @error('kk') is-invalid @enderror"
                                accept="application/pdf" >
                            <p>Tidak Ada Kartu Keluarga</p>
                          </div>
                          <div class="form-group">
                            <label for="nomor">Ijazah</label>
                            <input disabled onchange="readURL3()" type="file" name="ijazah" id="inputIjazah" 
                                    class="form-control @error('ijazah') is-invalid @enderror" 
                                accept="application/pdf">
                                <p>Tidak Ada Kartu Ijazah</p>
                          </div>
                          <div class="form-group">
                            <label for="email">Akta</label>
                            <input disabled onchange="readURL1()" type="file" name="akta" id="inputAkte" 
                                    class="form-control @error('akta') is-invalid @enderror" 
                                accept="application/pdf">
                                <p>Tidak Ada Kartu Akta</p>
                          </div>
                          <div class="form-group">
                            <label for="email">Rapor</label>
                            <input disabled onchange="readURL4()" type="file" name="rapor" id="inputAkte" 
                                    class="form-control @error('rapor') is-invalid @enderror" 
                                accept="application/pdf">
                                <p>Tidak Ada Rapor</p>
                          </div>
                        </div>
                      </div>  --}}
                      @endif
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

  </script>
@endpush