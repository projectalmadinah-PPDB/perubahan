@extends('pages.admin.dashboard.layouts.parent')

@section('title','Lolos')

@section('content')
    <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Siswa Lolos</h4>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('success')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session('delete')}}
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
                  <div class="card-title">Daftar Lolos</div>
                </div>
              </div>
              <div class="card-body">
                <form action="{{route('admin.lolos.index')}}" method="get">
                  @csrf
                  <div class="position-relative w-25" style="display: inline-flex">
                    <input type="text" name="search" class="form-control w-100 mb-3 rounded-4" >
                    <button class="btn btn-primary rounded-4 position-absolute top-0 end-0" type="submit">Find</button>
                  </div>
                  </form>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Nomor Hp</th>
                        <th>Status Kelulusan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($lolos as $index => $item)
                        <tr>
                          <td>{{$index + 1}}</td>
                          <td>{{$item->user->name}}</td>
                          <td>{{$item->user->nomor}}</td>
                          <td><button class="badge badge-success border-0">{{$item->status}}</button></td>
                          <td>
                            <form action="{{route('admin.lolos.update',$item->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="button" class="badge badge-warning border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              Edit Status
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <label for="email">Status</label>
                                    <select name="status" id="" class="form-select">
                                        <option disabled selected>Pilih Status</option>
                                        <option value="Lulus" {{$item->status == 'Lulus' ? 'selected' : ''}}>Lolos</option>
                                        <option value="Wawancara" {{$item->status == 'Wawancara' ? 'selected' : ''}}>Wawancara</option>
                                        <option value="Gagal" {{$item->status == 'Gagal' ? 'selected' : ''}}>Gagal</option>
                                    </select>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
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