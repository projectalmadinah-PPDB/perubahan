@extends('pages.admin.dashboard.layouts.parent')

@section('title','Peserta')

@section('content')
<div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Peserta</h4>
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
                  <div class="card-title">Peserta Table</div>
                  {{-- <a href="{{route('admin.document.create')}}" class="btn btn-primary float-end text-white">Create New</a> --}}
                </div>
              </div>
              <div class="card-body">
                <form action="{{route('admin.peserta.index')}}" method="get">
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
                        <th>Nomor Hp</th>
                        <th>Biodata</th>
                        <th>Status</th>
                        <th>Status Test</th>
                        {{-- <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th> --}}
                        {{-- <th>NIK</th> --}}
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $index => $item)
                        <tr>
                          <td>{{$index + 1}}</td>
                          <td>{{$item->user->name}}</td>
                          <td>{{$item->user->nomor}}</td>
                          {{-- <td>{{$item->tanggal_lahir}}</td>
                          <td>{{$item->jenis_kelamin}}</td> --}}
                          {{-- <td>{{$item->nik}}</td> --}}
                          @if($item && $item->user->document)
                          <td><button class="badge badge-success border-0">Lengkap &#x2714;</button></td>
                          @elseif ($item && !$item->user->document)
                          <td>
                            <button class="badge badge-success border-0">data &#x2714;
                            </button>
                            <a href="" class="badge badge-danger">Document &#x2715;</a>
                          </td>
                          @else
                          <td>
                            <button class="badge badge-danger border-0">Tidak Legkap</button></td>
                          @endif
                          <td>
                            @if ($item->user->status == 'Belum')
                                <button class="badge badge-warning border-0">Belum Verifikasi</button>
                            @elseif($item->user->status == 'Verifikasi')
                                <button class="badge badge-success border-0">TerVerifikasi</button>
                            @elseif($item->user->status == 'TidakSah')
                                <button class="badge badge-danger border-0">Tidak Sah</button>
                            @else
                            
                            @endif
                          </td>
                          <td>
                            @if ($item->status == 'Lulus')
                                <button class="badge badge-success border-0">Lulus</button>
                            @elseif($item->status == 'Gagal')
                                <button class="badge badge-danger border-0">Tidak Lulus</button>
                            @elseif($item->status == 'Wawancara')
                                <button class="badge badge-primary border-0">Wawancara</button>
                            @else
                                <button class="badge badge-warning border-0">Tidak Ada Status</button>
                            @endif
                          </td>
                          <td>
                            @if($item->student == NULL)
                            <a href="" class="badge badge-danger">Tidak Ada Data</a>
                            @else
                            <a href="{{route('admin.pendaftar.show',$item->id)}}" class="badge badge-primary">Data Pribadi</a>
                            @endif
                            @if ($item->document) 
                            <a href="{{route('admin.pendaftar.show_document',$item->document->id)}}" class="badge badge-warning">Document</a>
                            @endif
                            <a href="{{route('admin.peserta.edit',$item->id)}}" class="badge badge-warning">Edit</a>
                            <form action="{{route('admin.pendaftar.destroy',$item->id)}}" method="post" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="badge badge-danger border-0">Delete</button>
                            </form>
                            
                            <div class="dropdown d-inline">
                              <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                              </a>
                            
                              <div class="dropdown-menu" aria-labelledby="customDropdown">
                                <form action="{{route('admin.pengecekan',$item->id)}}" method="post">
                                  @csrf
                                  @method('POST')
                                  <div class="d-flex flex-wrap">
                                    <button type="submit" name="status" value="Lulus" class="border-0 bg-success w-100 text-bold text-white" >Lolos Semua</button>
                                    <button name="status" type="submit" class="border-0 bg-danger w-100 text-bold text-white" value="Wawancara">Lanjut Wawancara</button>
                                    <button type="submit" name="status" value="Gagal" class="border-0 bg-warning w-100 text-bold text-white" >Gagal / Gugur</button>
                                  </div>
                                  {{-- <form action="{{route('admin.pengecekan',$item->student->id)}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" name="status" value="lolos" class="badge badge-success border-0">Lulus</button>
                                    <button type="submit" name="status" value="gagal" class="badge badge-danger border-0">Gagal</button>
                                  </form> --}}
                                </form>
                              </div>
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