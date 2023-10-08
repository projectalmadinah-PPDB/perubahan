@extends('pages.admin.dashboard.layouts.parent')

@section('title' , 'Tambah Pengguna')

@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Pengguna</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="card rounded-4">
            <div class="card-header">
              <div class="card-title">Tambah Pengguna</div>
            </div>
            <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" value="{{ old('name') }}" class="form-control rounded-4 @error('name') is-invalid @enderror"  name="name" placeholder="Nama">
                            @error('name')
                              <small class="text-danger font-italic">{{$message}}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" value="{{ old('email') }}" class="form-control rounded-4 @error('email') is-invalid @enderror" type="email" placeholder="Email">
                            @error('email')
                              <small class="text-danger font-italic">{{$message}}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="nomor">No. Whatsapp</label>
                            <input name="nomor" value="{{ old('nomor') }}" class="form-control rounded-4 @error('nomor') is-invalid @enderror" type="tel" placeholder="Nomor Whatsapp">
                            @error('nomor')
                              <small class="text-danger font-italic">{{$message}}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" class="form-control rounded-4 @error('password') is-invalid @enderror" type="password" placeholder="••••••">
                            @error('password')
                              <small class="text-danger font-italic">{{$message}}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" value="{{ old('tanggal_lahir') }}" class="form-control rounded-4 @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir">
                            @error('tanggal_lahir')
                              <small class="text-danger font-italic">{{$message}}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-select rounded-4 @error('jenis_kelamin') is-invalid @enderror">
                              <option disabled selected>-- Pilih Jenis Kelamin --</option>
                              <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki</option>
                              <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                              <small class="text-danger font-italic">{{$message}}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-select rounded-4 @error('role') is-invalid @enderror">
                              <option disabled selected>-- Pilih Role --</option>
                              <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                              <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('role')
                              <small class="text-danger font-italic">{{$message}}</small>
                            @enderror
                          </div>
                        </div>
                      </div>
                    <div class="card-action">
                      <button class="btn btn-success px-4" type="submit">Submit</button>
                      <a href="{{route('admin.users.index')}}" class="btn btn-warning" type="button">Back</a>
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