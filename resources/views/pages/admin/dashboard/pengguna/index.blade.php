@extends('pages.admin.dashboard.layouts.parent')

@section('title','Pengguna')

@section('content')
    <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Pengguna</h4>
        @if(session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session('delete')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session('active'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          {{session('active')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session('edit'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          {{session('edit')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
          <div class="col-md-12">
            <div class="card rounded-4">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="card-title">Daftar {{ Route::is('admin.users.index') ? 'Admin' : 'User' }}</div>
                  <a href="{{ route('admin.users.create') }}" class="btn btn-primary float-end text-white rounded-4">Tambah +</a>
                </div>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-bordered" id="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telp.</th>
                        <th>Aktif</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item => $user)
                        <tr>
                          <td>{{ $loop->iteration}}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->nomor }}</td>
                          <td>
                            @if(!$user->active == 1)
                            <span class="badge bg-info" style="cursor: pointer">Aktif</span>
                            @else
                            <form action="{{ route('admin.users.update_active', $user->id) }}" method="post">
                              @csrf
                              @method('PUT')
                              <button style="cursor: pointer; color: #fff!important; border: 0; background: none;" type="button" onclick="confirm('Yakin ingin mengaktif/nonaktifkan Pengguna?') ? setAttribute('type', 'submit') : ''" class="m-0 p-0">
                                <span class="badge bg-{{ $user->active == 1 ? 'info' : 'secondary' }}">
                                  <label for="activeUser" style="cursor: pointer; font-size: 12px!important;" class="text-white fw-bold">
                                    <input id="activeUser" type="checkbox" name="active" class="d-none" {{ $user->active == 1 ? 'checked' : '' }}>
                                    {{ $user->active == 1 ? 'Aktif' : 'Nonaktif' }}
                                  </label>
                                </span>
                              </button>
                            </form>
                            @endif
                          </td>
                          <td>
                              <button type="button" data-bs-toggle="modal" data-bs-target="#updateUser{{ $user->id }}" class="badge border-0 m-0 badge-primary" style="padding: .45rem;">
                                  <i class="bi bi-pencil" style="font-size: 13px"></i>
                              </button>

                              {{-- Modal Edit --}}
                              <div class="modal fade" id="updateUser{{ $user->id }}" tabindex="-1" aria-labelledby="updateUser{{ $user->id }}Label" aria-hidden="true">
                                  <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                                      @csrf
                                      @method('PUT')
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header align-items-center gap-2">
                                                  <h1 class="modal-title fs-5" id="updateUser{{ $user->id }}Label">Detail Pengguna</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div id="edit{{ $user->id }}" class="modal-body">
                                                <div class="mb-2">
                                                  <label for="name">Nama</label>
                                                  <input type="text" value="{{ $user->name }}" class="form-control rounded-4 @error('name') is-invalid @enderror"  name="name" placeholder="Nama">
                                                  @error('name')
                                                    <small class="text-danger font-italic">{{$message}}</small>
                                                  @enderror
                                                </div>
                                                <div class="mb-2">
                                                  <label for="email">Email</label>
                                                  <input name="email" value="{{ $user->email }}" class="form-control rounded-4 @error('email') is-invalid @enderror" type="email" placeholder="Email">
                                                  @error('email')
                                                    <small class="text-danger font-italic">{{$message}}</small>
                                                  @enderror
                                                </div>
                                                <div class="mb-2">
                                                  <label for="nomor">No. Whatsapp</label>
                                                  <input name="nomor" value="{{ $user->nomor }}" class="form-control rounded-4 @error('nomor') is-invalid @enderror" type="tel" placeholder="Nomor Whatsapp">
                                                  @error('nomor')
                                                    <small class="text-danger font-italic">{{$message}}</small>
                                                  @enderror
                                                </div>
                                                <div class="mb-2">
                                                  <label for="password">Password</label>
                                                  <input name="password" class="form-control rounded-4 @error('password') is-invalid @enderror" type="password" placeholder="••••••">
                                                  @error('password')
                                                    <small class="text-danger font-italic">{{$message}}</small>
                                                  @enderror
                                                </div>
                                                <div class="mb-2">
                                                  <label for="tanggal_lahir">Tanggal Lahir</label>
                                                  <input type="date" value="{{ $user->tanggal_lahir }}" class="form-control rounded-4 @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir">
                                                  @error('tanggal_lahir')
                                                    <small class="text-danger font-italic">{{$message}}</small>
                                                  @enderror
                                                </div>
                                                <div class="mb-2">
                                                  <label for="jenis_kelamin">Jenis Kelamin</label>
                                                  <select name="jenis_kelamin" id="" class="form-select rounded-4 @error('jenis_kelamin') is-invalid @enderror">
                                                    <option disabled hidden selected>-- Pilih Jenis Kelamin --</option>
                                                    <option value="Laki-Laki" {{ $user->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki</option>
                                                    <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                  </select>
                                                  @error('jenis_kelamin')
                                                    <small class="text-danger font-italic">{{$message}}</small>
                                                  @enderror
                                                </div>
                                                <div class="mb-2">
                                                  <label for="role">Role</label>
                                                  <select name="role" id="role" class="form-select rounded-4 @error('role') is-invalid @enderror">
                                                    <option disabled hidden selected>-- Pilih Role --</option>
                                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                                  </select>
                                                  @error('role')
                                                    <small class="text-danger font-italic">{{$message}}</small>
                                                  @enderror
                                                </div>
                                                <div class="mb-2">
                                                  <label for="active">Aktif</label>
                                                  <select name="active" id="active" class="form-select rounded-4 @error('active') is-invalid @enderror">
                                                    <option disabled hidden selected>-- Status --</option>
                                                    <option value="1" {{ $user->active == '1' ? 'selected' : '' }}>Aktif</option>
                                                    <option value="0" {{ $user->active == '0' ? 'selected' : '' }}>Non Aktif</option>
                                                  </select>
                                                  @error('active')
                                                    <small class="text-danger font-italic">{{$message}}</small>
                                                  @enderror
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  <button id="submitButtonEdit{{ $user->id }}" type="submit" class="btn btn-primary">Save Changes</button>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                              <button type="button" data-bs-toggle="modal" data-bs-target="#detailUser{{ $user->id }}" class="badge border-0 m-0 p-1 badge-warning d-inline">
                                  <i class="bi bi-info fs-5"></i>
                              </button>
                      
                              {{-- Modal Detail --}}
                              <div class="modal fade" id="detailUser{{ $user->id }}" tabindex="-1" aria-labelledby="detailUser{{ $user->id }}Label" aria-hidden="true">
                                  <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                                      @csrf
                                      @method('PUT')
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header align-items-center gap-2">
                                                  <h1 class="modal-title fs-5" id="updateUser{{ $user->id }}Label">Detail Pengguna</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div id="detailForm{{ $user->id }}" class="modal-body">
                                                <div class="mb-2">
                                                  <p class="">Nama : {{ $user->name }}</p>
                                                </div>
                                                <div class="mb-2">
                                                  <p class="">Email : {{ $user->email }}</p>
                                                </div>
                                                <div class="mb-2">
                                                  <p class="">No. Whatsapp : {{ $user->nomor }}</p>
                                                </div>
                                                <div class="mb-2">
                                                  <p class="">Role : {{ $user->role }}</p>
                                                </div>
                                                <div class="mb-2">
                                                  <p class="">Jenis Kelamin : {{ $user->jenis_kelamin }}</p>
                                                </div>
                                                <div class="mb-2">
                                                  <p class="">Tanggal Lahir : {{ $user->tanggal_lahir }}</p>
                                                </div>
                                                <div class="mb-2">
                                                  <p class="">Aktif : {{ $user->active == 1 ? 'Ya' : 'Tidak' }}</p>
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                              
                              <form method="POST" class="d-inline" action="{{ route('admin.users.delete', $user->id) }}">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" onclick="confirm('Yakin ingin menghapus data?') ? this.form.submit() : ''" class="badge p-1 badge-danger border-0">
                                      <i class="bi bi-x fs-5"></i>
                                  </button>
                              </form>
                          </td>
                      </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
@endsection
@push('add-script')
  <script>
    $(document).ready(function(){
      $('#table').DataTable();
    });
  </script>
@endpush