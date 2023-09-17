@extends('pages.admin.dashboard.layouts.parent')

@section('title','Pendaftar')

@push('add-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Pendaftar</h4>
        <div class="row">
          <div class="col-md-12">
            <div class="card rounded-4">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="card-title">Daftar Pendaftar</div>
                  {{-- <button class="btn btn-primary" onclick="edit()">Ubah Data</button> --}}
                  <div class="d-flex">
                    <a href="{{route('admin.pendaftar.export')}}" class="btn btn-primary">Export Excel</a>
                    <button class="btn btn-danger ms-2 float-end" onclick="destroy(event)">Delete</button>
                  </div>
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
                    <form action="" name="form1" id="form1" method="POST">
                      @csrf
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th><input type="checkbox" name="select_all" class="select_all" id="select_all"></th>
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
                          <tr>
                            <td><input type="checkbox" name="id[{{$item->id}}]" class="checkbox1" value="{{$item->id}}"></td>
                            <td>{{$index + $users->firstItem()}}</td>
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
                    {!! $users->links() !!}
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
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

    // function edit() {
    //     document.form1.action = "/admin/peserta/coba/edit"
    //     document.form1.submit()
    // }

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
          document.form1.action = "/admin/pendaftar/delete-all"
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