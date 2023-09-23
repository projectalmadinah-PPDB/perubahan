@extends('pages.admin.dashboard.layouts.parent')

@section('title' , 'Create Biodata')

@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Biodata</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="card rounded-4">
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
                            <input type="text" class="form-control rounded-4"  name="name" placeholder="Nama Lengkap Anda" value="">
                          </div>
                          <div class="form-group">
                            <label for="nomor">NO HP</label>
                            <input name="nomor" class="form-control rounded-4" type="text" placeholder="Nomor Whatshap" value="">
                          </div>
                          <div class="form-group">
                            <label for="nomor">Password</label>
                            <input name="password" class="form-control rounded-4" type="password" placeholder="********" value="">
                          </div>
                          <div class="form-group">
                            <label for="email">Tanggal Lahir</label>
                            <input type="date" class="form-control rounded-4" name="tanggal_lahir" value="">
                          </div>
                          <div class="form-group">
                            <label for="email">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-select rounded-4">
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    <div class="card-action">
                      <button class="btn btn-success px-4" type="submit">Submit</button>
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