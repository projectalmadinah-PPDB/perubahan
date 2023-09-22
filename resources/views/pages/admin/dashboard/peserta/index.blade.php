@extends('pages.admin.dashboard.layouts.parent')

@section('title','Peserta')

@push('add-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Peserta</h4>
        <div class="row">
          <div class="col-md-12">
            <div class="card rounded-4">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="card-title">Daftar Peserta</div>
                  <div class="d-flex justify-content-between">
                    <a href="{{route('admin.peserta.export')}}" class="btn btn-primary me-2">Download Excel</a>
                    <button class="btn btn-primary" onclick="edit()">Ubah Data</button>
                    <button class="btn btn-danger ms-2 float-end" onclick="destroy(event)">Delete</button>
                </div>
                </div>
              </div>
              <div class="card-body">
                <form action="{{route('admin.peserta.index')}}" method="get">
                  @csrf
                  <div class="position-relative w-25" style="display: inline-flex">
                    <input type="text" name="search" class="form-control w-100 mb-3 rounded-4" >
                    <button class="btn btn-primary rounded-4 position-absolute top-0 end-0" type="submit">Find</button>
                  </div>
                  </form>
                <!-- Tombol "Action" di atas tabel -->  
                <div class="table-responsive">
                  <form action="" name="form1" id="form1" method="POST">
                    @csrf
                  <table class="table table-bordered data">
                    <thead>
                      <tr>
                        <th><input type="checkbox" name="select_all" class="select_all" id="select_all"></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Nomor Hp</th>
                        <th>Biodata</th>
                        <th>Status Pembayaran</th>
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
                          <td><input type="checkbox" name="id[{{$item->id}}]" class="checkbox1" value="{{$item->id}}"></td>
                          <td>{{$index + $data->firstItem()}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->nomor}}</td>
                          {{-- <td>{{$item->tanggal_lahir}}</td>
                          <td>{{$item->jenis_kelamin}}</td> --}}
                          {{-- <td>{{$item->nik}}</td> --}}
                          @if($item->student && $item->document)
                          <td><a class="badge badge-success border-0 text-white">Lengkap &#x2714;</a></td>
                          @elseif ($item->student && !$item->document)
                          <td>
                            <a class="badge badge-success border-0 text-white">data &#x2714;
                            </a>
                            <a href="" class="badge badge-danger">Document &#x2715;</a>
                          </td>
                          @else
                          <td>
                            <button class="badge badge-danger border-0">Tidak Legkap</button></td>
                          @endif
                          <td>
                            @if (!$item == 'pending')
                            <a class="badge badge-danger border-0 text-white">Belum Bayar</a>
                            @elseif($item->payment->status == 'berhasil')
                            <a class="badge badge-success border-0 text-white">Lunas</a>
                            @elseif($item->payment->status == 'expired')
                            <a class="badge badge-warning border-0 text-white">Pending</a>
                            @endif
                          </td>
                          <td>
                            @if ($item->status == 'Belum')
                                <a class="badge badge-danger border-0 text-white">Tidak Ada Status</a>
                            @elseif($item->status == 'Gagal')
                                <a class="badge badge-danger border-0 text-white">Tidak Lulus</a>
                            @elseif($item->status == 'Wawancara')
                                <a class="badge badge-primary border-0 text-white">Wawancara</a>
                            @elseif($item->status == 'Lulus')
                                <a class="badge badge-success border-0 text-white">Lulus</a>
                            @endif
                          </td>
                          </form>
                          <td>
                            @if(!$item->student)
                            <a href="" class="badge badge-danger">Tidak Ada Data</a>
                            @else
                            <a href="{{route('admin.peserta.show',$item->id)}}" class="badge badge-primary">Data Pribadi</a>
                            @endif
                            @if ($item->document) 
                            <a href="{{route('admin.peserta.document',$item->document->id)}}" class="badge badge-warning">Document</a>
                            @endif
                            <a href="{{route('admin.peserta.edit',$item->id)}}" class="badge badge-warning">Edit</a>
                            <form action="{{route('admin.peserta.destroy',$item->id)}}" method="post" class="d-inline">
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
                  {{$data->links()}}
                </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#select_all').on('click',function(){
            if(this.checked){
                $('.checkbox1').each(function(){
                    this.checked = true;
                })
            }else{
                $('.checkbox1').each(function(){
                    this.checked = false;
                })
            }
        })

        $('.checkbox1'),on('click',function(){
            if($('.checkbox1:checked').length == $('.checkbox1').length){
                $('#select_all').prop('checked',true)
            }else{
                $('#select_all').prop('checked',false)
            }
        })
    });

    function edit() {
        document.form1.action = "/admin/peserta/coba/edit"
        document.form1.submit()
    }

    function destroy(event) {
      event.preventDefault()
      if($('.checkbox1').is(':checked')){
        Swal.fire({
        title: 'Kamu Yakin?',
        text: "Yakin Ingin Menghapus Banyak Data",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.form1.action = "/admin/peserta/delete-all"
          document.form1.submit()
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })
      }else{
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Select Data Yang Ingin Di Hapus Massal',
      })
      }
    }
</script>
  @if (session('success'))
  <script>
    toastr.options = {
      "progressBar" : true,
      "closeButton" : true
    }
    toastr.success("{{ session('success') }}");
  </script>
@elseif(session('delete'))
<script>
  toastr.options = {
    "progressBar" : true,
    "closeButton" : true
  }
  toastr.error("{{ session('delete') }}");
</script>
@elseif(session('edit'))
<script>
  toastr.options = {
    "progressBar" : true,
    "closeButton" : true
  }
  toastr.warning("{{ session('edit') }}");
</script>
@endif
@endpush