@extends('pages.admin.dashboard.layouts.parent')

@section('title','Lolos')

@section('content')
    <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Laporan Keseluruhan</h4>
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
                  <div class="card-title">Daftar Laporan Pendaftar</div>
                  <a href="{{route('admin.lolos.export')}}" class="btn btn-primary">Export Excel</a>
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
                        <th>Nik</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Nomor Hp</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Status Pembayaran</th>
                        <th>Tempat Lahir</th>
                        <th>Hobby</th>
                        <th>Cita-Cita</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Asal Sekolah</th>
                        <th>Alamat</th>
                        <th>Status Kelulusan</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                        <tr>
                          <td>{{$index + $data->firstItem()}}</td>
                          <td>{{!$item->student ? 'Tidak Ada NIK' : $item->student->nik}}</td>
                          <td>{{!$item->student ? 'Tidak Ada NISN' : $item->student->nisn}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->nomor}}</td>
                          <td>{{$item->jenis_kelamin}}</td>
                          <td>{{$item->tanggal_lahir}}</td>
                          <td>{{!$item->payment ? 'Belum Membayar' : $item->payment->status}}</td>
                          <td>{{!$item->student ? 'Tidak Ada Data' : $item->student->birthplace}}</td>
                          <td>{{!$item->student ? 'Tidak Ada HOBBY' : $item->student->hobby}}</td>
                          <td>{{!$item->student ? 'Tidak Ada Cita-Cita' : $item->student->ambition}}</td>
                          <td>{{!$item->student ? 'Tidak Ada Pendidikan Terakhir' : $item->student->last_graduate}}</td>
                          <td>{{!$item->student ? 'Tidak Ada Asal Sekolah' : $item->student->old_school}}</td>
                          <td>{{!$item->student ? 'Tidak Ada Alamat' : $item->student->address}}</td>
                          <td>{{!$item->status == 'Belum' ? 'Mendaftar' : $item->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{$data->links()}}
                </div>
              </div>
            </div>
          </div> 
        </div>
        <div class="">
            <div class="row">
          <div class="col-md-6">
            <div class="card rounded-4">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="card-title">Daftar Laporan Pembayaran</div>
                  <a href="{{route('admin.lolos.export')}}" class="btn btn-primary">Export Excel</a>
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
                        <th>Nama</th>
                        <th>Nomor Hp</th>
                        <th>Nomor Transaksi</th>
                        <th>Status Pembayaran</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($payment as $index => $item)
                        <tr>
                          <td>{{$index + $payment->firstItem()}}</td>
                          <td>{{$item->user->name}}</td>
                          <td>{{$item->user->nomor}}</td>
                          <td>{{$item->no_invoice}}</td>
                          <td>{{$item->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{$payment->links()}}
                </div>
              </div>
            </div>
          </div> 
          <div class="col-md-6">
            <div class="card rounded-4">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="card-title">Daftar Laporan Kelulusan</div>
                  <a href="{{route('admin.lolos.export')}}" class="btn btn-primary">Export Excel</a>
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
                        <th>Nama</th>
                        <th>Nomor Hp</th>
                        <th>Nomor Transaksi</th>
                        <th>Status Pembayaran</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($payment as $index => $item)
                        <tr>
                          <td>{{$index + $payment->firstItem()}}</td>
                          <td>{{$item->user->name}}</td>
                          <td>{{$item->user->nomor}}</td>
                          <td>{{$item->no_invoice}}</td>
                          <td>{{$item->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{$payment->links()}}
                </div>
              </div>
            </div>
          </div> 
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection