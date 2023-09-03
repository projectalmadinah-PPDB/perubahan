@extends('pages.admin.dashboard.layouts.parent')

@section('title' , 'Create Biodata')

@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Biodata</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Tambah Biodata</div>
            </div>
            <form action="{{route('admin.biodata.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="Title">Nama Lengkap</label>
                            <input type="text" class="form-control"  name="name" placeholder="Nama Lengkap Anda" value="">
                          </div>
                          <div class="form-group">
                            <label for="nomor">NO HP</label>
                            <input name="nomor" class="form-control" type="text" placeholder="Nomor Whatshap" value="">
                          </div>
                          <div class="form-group">
                            <label for="nomor">Password</label>
                            <input name="password" class="form-control" type="password" placeholder="********" value="">
                          </div>
                          <div class="form-group">
                            <label for="email">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="">
                          </div>
                          <div class="form-group">
                            <label for="email">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-select">
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      {{-- <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nik">Nomor Induk Kependudukan</label>
                                <input type="number" class="form-control"  name="nik" placeholder="Nomor Induk Kependudukan anda">
                              </div>
                          <div class="form-group">
                            <label for="Title">Nama Ayah</label>
                            <input type="text" class="form-control"  name="nama_ayah" placeholder="Nama Ayah Anda ">
                          </div>
                          <div class="form-group">
                            <label for="nomor">Nomor Ayah</label>
                            <input name="no_ayah" class="form-control" type="text" placeholder="Nomor Whatshap Ayah Anda" value="">
                          </div>
                          <div class="form-group">
                            <label for="email">Nama Ibu</label>
                            <input name="nama_ibu" class="form-control" type="text" value="">
                          </div>
                          <div class="form-group">
                            <label for="email">Nomor Ibu</label>
                            <input type="text" class="form-control" name="no_ibu" value="">
                          </div>
                          <div class="form-group">
                            <label for="email">Alamat</label>
                            <textarea name="alamat" id="" class="form-control" rows="5">
                              
                            </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="card-body d-flex flex-wrap">
                          <div class="form-group" style="width:300px;margin-right:5px">
                            <label for="Title">Kartu Keluarga</label>
                            <input onchange="readURL2()" type="file" name="kk" id="inputKk" 
                                    class="form-control"
                                accept="application/pdf">
                            <object id="outputKk" 
                                    class="bg-slate-200 mt-2 w-full rounded-lg shadow-inner" height="400" 
                                type="application/pdf"></object>
                          </div>
                          <div class="form-group" style="width:300px;margin-right:5px">
                            <label for="nomor">Ijazah</label>
                            <input onchange="readURL3()" type="file" name="ijazah" id="inputIjazah" 
                                    class="form-control" 
                                accept="application/pdf">
                            <object id="outputIjazah" 
                                    class="bg-slate-200 dark:bg-slate-800 w-full mt-2 rounded-[30px] shadow-inner" height="400" 
                                type="application/pdf"></object>
                          </div>
                          <div class="form-group"style="width:300px;margin-right:5px">
                            <label for="email">Akta</label>
                            <input onchange="readURL1()" type="file" name="akta" id="inputAkte" 
                                    class="form-control" 
                                accept="application/pdf">
                            <object id="outputAkte" 
                                    class="bg-slate-200 dark:bg-slate-800 w-full mt-2 rounded-[30px] shadow-inner" height="400" 
                                type="application/pdf"></object>
                          </div>
                        </div>
                      </div>  --}}
                    <div class="card-action">
                      <button class="btn btn-success" type="submit">Submit</button>
                      <a href="{{route('admin.biodata.index')}}" class="btn btn-warning" type="button">Back</a>
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