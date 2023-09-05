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
                            <input type="text" class="form-control"  name="name" placeholder="Enter Name" value="{{$biodata->name}}">
                          </div>
                          <div class="form-group">
                            <label for="nomor">NO HP</label>
                            <input name="nomor" class="form-control" type="text" value="{{$biodata->nomor}}">
                          </div>
                          <div class="form-group">
                            <label for="email">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="{{$biodata->tanggal_lahir}}">
                          </div>
                          <div class="form-group">
                            <label for="email">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-select">
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki" {{$biodata->jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}}>Laki</option>
                                <option value="Perempuan" {{$biodata->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                     @if(!$biodata->pendaftaran)
                     @else
                     <div class="col-md-6">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="Title">Nomor Induk Kependudukan</label>
                          <input type="text" class="form-control"  name="nik" placeholder="Enter Name" value="{{$biodata->pendaftaran->nik}}">
                        </div>
                        <div class="form-group">
                          <label for="Title">Nama Ayah</label>
                          <input type="text" class="form-control"  name="nama_ayah" placeholder="Enter Name" value="{{$biodata->pendaftaran->nama_ayah}}">
                        </div>
                        <div class="form-group">
                          <label for="nomor">Nomor Ayah</label>
                          <input name="no_ayah" class="form-control" type="text" value="{{$biodata->pendaftaran->no_ayah}}">
                        </div>
                        <div class="form-group">
                          <label for="email">Nama Ibu</label>
                          <input name="nama_ibu" class="form-control" type="text" value="{{$biodata->pendaftaran->nama_ibu}}">
                        </div>
                        <div class="form-group">
                          <label for="email">Nomor Ibu</label>
                          <input type="text" class="form-control" name="no_ibu" value="{{$biodata->pendaftaran->no_ibu}}">
                        </div>
                        <div class="form-group">
                          <label for="email">Alamat</label>
                          <textarea name="alamat" id="" class="form-control" rows="5">
                            {{$biodata->pendaftaran->alamat}}
                          </textarea>
                        </div>
                      </div>
                    </div>
                     @endif
                      @if(!$biodata->document) 
                      @else
                      <div class="col-md-12">
                        <div class="card-body d-flex">
                          <div class="form-group">
                            <label for="Title">Kartu Keluarga</label>
                            <input onchange="readURL2()" type="file" name="kk" id="inputKk" 
                                    class="form-control"
                                accept="application/pdf" >
                            <object id="outputKk" 
                                    class="bg-slate-200 bg-dark mt-2 w-full rounded-lg shadow-inner" height="400" 
                                type="application/pdf" data="{{ asset('storage/' . $biodata->document->kk) }}"></object>
                          </div>
                          <div class="form-group">
                            <label for="nomor">Ijazah</label>
                            <input onchange="readURL3()" type="file" name="ijazah" id="inputIjazah" 
                                    class="form-control" 
                                accept="application/pdf">
                            <object id="outputIjazah" 
                                    class="bg-slate-200 dark:bg-slate-800 w-full mt-2 rounded-[30px] shadow-inner" height="400" 
                                type="application/pdf" data="{{ asset('storage/' . $biodata->document->ijazah) }}"></object>
                          </div>
                          <div class="form-group">
                            <label for="email">Akta</label>
                            <input onchange="readURL1()" type="file" name="akta" id="inputAkte" 
                                    class="form-control" 
                                accept="application/pdf">
                            <object id="outputAkte" 
                                    class="bg-slate-200 dark:bg-slate-800 w-full mt-2 rounded-[30px] shadow-inner" height="400" 
                                type="application/pdf" data="{{ asset('storage/' . $biodata->document->akta) }}"></object>
                          </div>
                        </div>
                      </div> 
                      @endif
                    <div class="card-action">
                      <button class="btn btn-success" type="submit">Submit</button>
                      <a href="{{route('admin.pendaftar.index')}}" class="btn btn-warning" type="button">Back</a>
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