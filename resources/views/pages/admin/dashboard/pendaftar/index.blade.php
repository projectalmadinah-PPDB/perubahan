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
            <div class="card rounded-4">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="card-title">Daftar Pendaftar</div>
                  {{-- <a href="{{route('admin.biodata.create')}}" class="btn btn-primary float-end text-white">Create New</a> --}}
                </div>
              </div>
              <div class="card-body">
                <form action="{{route('admin.pendaftar.index')}}" method="get">
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
                        <th><input class="align-items-center" type="checkbox" id="chkCheckAll"></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Nomor Hp</th>
                        <th>Biodata</th>
                        <th>Status Pembayaran</th>
                        {{-- <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th> --}}
                        {{-- <th>NIK</th> --}}
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $index => $item)
                        <tr id="sid{{$item->id}}">
                          <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$item->id}}"></td>
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
                            @if (!$item->payment)
                            <button class="badge badge-primary border-0">Belum Membayar</button>
                            @else
                              @if ($item->payment->status == 'berhasil')
                                <button class="badge badge-success border-0">{{$item->payment->status}}</button>
                              @elseif($item->payment->status == 'expired')
                              <button class="badge badge-danger border-0">{{$item->payment->status}}</button>
                              @else
                              <button class="badge badge-warning border-0">{{$item->payment->status}}</button>
                              @endif
                            @endif
                          </td>
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
@push('add-script')

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(function(e)){
    $("#chkCheckAll").click(function(){
      $(".checkBoxClass").prop('checked',$(this).prop('checked'));
    });
  }
  </script>
@endpush