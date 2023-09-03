@extends('pages.admin.dashboard.layouts.parent')

@section('title','Pendaftar')

@section('content')
<div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Pendaftar</h4>
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
                  <div class="card-title">Pendaftar Table</div>
                  {{-- <a href="{{route('admin.biodata.create')}}" class="btn btn-primary float-end text-white">Create New</a> --}}
                </div>
              </div>
              <div class="card-body">
                <form action="{{route('admin.pendaftar.index')}}" method="get">
                @csrf
                <div class="d-flex">
                  <input type="text" class="form-control w-25 mb-3" name="search">
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
                        <th>Nomor Hp</th>
                        <th>Biodata</th>
                        {{-- <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th> --}}
                        {{-- <th>NIK</th> --}}
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $index => $item)
                        <tr>
                          <td>{{$index + 1}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->nomor}}</td>
                          {{-- <td>{{$item->tanggal_lahir}}</td>
                          <td>{{$item->jenis_kelamin}}</td> --}}
                          {{-- <td>{{$item->nik}}</td> --}}
                          @if($item->student && $item->document)
                          <td><button class="badge badge-success border-0">Lengkap</button></td>
                          @else
                          <td><button class="badge badge-danger border-0">Tidak Legkap</button></td>
                          @endif
                          <td>
                            @if($item->student == NULL)
                            <a href="" class="badge badge-danger">Tidak Ada Data</a>
                            @else
                            <a href="{{route('admin.pendaftar.show',$item->id)}}" class="badge badge-primary">Data Pribadi</a>
                            @endif
                            @if ($item->document == NULL)
                            <a href="" class="badge badge-danger">Tidak Ada Document</a>
                            @else
                            <a href="{{route('admin.pendaftar.show_document',$item->document->id)}}" class="badge badge-warning">Document</a>
                            @endif
                            <a href="{{route('admin.pendaftar.edit',$item->id)}}" class="badge badge-warning">Edit</a>
                            <form action="{{route('admin.pendaftar.destroy',$item->id)}}" method="post" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="badge badge-danger border-0">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{$users->links()}}
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
@endsection