@extends('pages.admin.dashboard.layouts.parent')

@section('title','Wawancara')

@section('content')
    <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Wawancara Siswa</h4>
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
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="card-title">Wawancara Siswa Table</div>
                </div>
              </div>
              <div class="card-body">
                <form action="{{route('admin.lolos.index')}}" method="get">
                  @csrf
                  <div class="d-flex">
                    <input type="text" name="search" class="form-control w-25 mb-3" >
                    <div>
                      <button class="btn btn-primary" type="submit">Find</button>
                    </div>
                  </div>
                  </form>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Tanggal Wawancara</th>
                        <th>Waktu Wawancara</th>
                        <th>Link</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                        <tr>
                          <td>{{$index + 1}}</td>
                          <td>{{$item->user->name}}</td>
                          <td>
                            @if ($item->wawancara)
                                {{$item->wawancara->tanggal}}
                            @else
                                Belum Ada
                            @endif
                          </td>
                          <td>@if ($item->wawancara)
                            {{$item->wawancara->jam}}
                            @else
                                Belum Ada
                            @endif
                          </td>
                          <td>@if ($item->wawancara)
                            <a href="{{$item->wawancara->link}}" target="_blank">{{$item->wawancara->link}}</a>
                            @else
                                Belum Ada
                            @endif
                          </td>
                          <td>
                            <div class="d-flex">
                            @if($item->wawancara)
                            <form action="{{route('admin.wawancara.update',$item->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="button" class="badge badge-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                              Update
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$item->id}}" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data wawancara</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="mb-2">
                                        <label for="">Tanggal Wawancara</label>
                                        <input type="date" class="form-control" name="tanggal" value="{{$item->wawancara->tanggal}}">
                                    </div>
                                    <div class="mb-2">
                                      <label for="">Waktu Wawancara</label>
                                      <input type="time" class="form-control" name="jam" value="{{$item->wawancara->jam}}">
                                  </div>
                                    <div class="mb-2">
                                        <label for="">Link Wawancara</label>
                                        <input type="text" class="form-control" name="link" value="{{$item->wawancara->link}}">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                          @else 
                          <form action="{{route('admin.wawancara.create',$item->id)}}" method="post">
                          @csrf
                          @method('POST')
                            <button type="button" class="badge badge-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              Input wawancara
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Data wawancara</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="mb-2">
                                        <label for="">Tanggal Wawancara</label>
                                        <input type="date" class="form-control" name="tanggal">
                                    </div>
                                    <div class="mb-2">
                                      <label for="">Waktu Wawancara</label>
                                      <input type="time" class="form-control" name="jam">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Link Wawancara</label>
                                        <input type="text" class="form-control" name="link">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                          @endif
                        </div>
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