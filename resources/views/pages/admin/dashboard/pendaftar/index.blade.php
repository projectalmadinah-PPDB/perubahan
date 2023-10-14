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
                <div class="d-flex justify-content-between align-items-center">
                  <div class="card-title">
                    Daftar Pendaftar
                    <small class="d-block">Daftar user yang melakukan pendaftaran</small>
                  </div>
                  {{-- <button class="btn btn-primary" onclick="edit()">Ubah Data</button> --}}
                  <div class="d-flex">
                    <a href="{{route('admin.pendaftar.export')}}" class="btn btn-primary rounded-4">Export Excel</a>
                    <button class="btn btn-danger ms-2 float-end rounded-4" onclick="destroy(event)">Delete</button>
                  </div>
                </div>
              </div>
              {{-- <form action="{{route('admin.pendaftar.destroy',$item->id)}}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
              </form> --}}
              @foreach ($users as $item)
              <form id="remove{{$item->id}}" action="{{route('admin.pendaftar.destroy',$item->id)}}" method="post" class="d-inline">
                  @csrf
                  @method('DELETE')
              </form>
              @endforeach
              <div class="card-body">
                  <div class="table-responsive">
                    <form action="" name="form1" id="form1" method="POST">
                      @csrf
                    <table class="table table-bordered" id="table">
                      <thead>
                        <tr>
                          <th style="width: 25px"><input type="checkbox" name="select_all" class="select_all" id="select_all"></th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Nomor Hp</th>
                          <th>Status Biodata</th>
                          <th>Status Pembayaran</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $index => $item)
                          <tr>
                            <td><input type="checkbox" name="id[{{$item->id}}]" class="checkbox1" value="{{$item->id}}"></td>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->nomor}}</td>
                            @if($item->student && $item->document)
                            <td><button class="badge badge-success border-0">Lengkap</button></td>
                            @elseif($item->student && !$item->document)
                            <td><button class="badge badge-info border-0">Tidak Lengkap</button></td>
                            @else
                            <td><button class="badge badge-info border-0">Tidak Ada</button></td>
                            @endif
                            <td>
                              @if (!$item->payment)
                              <button class="badge badge-info border-0">Tidak Ada</button>
                              @else
                                @if ($item->payment->status == 'berhasil')
                                  <button class="badge text-capitalize badge-success border-0">Sukses</button>
                                @elseif($item->payment->status == 'expired')
                                <button class="badge text-capitalize badge-info border-0">{{$item->payment->status}}</button>
                                @else
                                <button class="badge text-capitalize badge-warning border-0">{{$item->payment->status}}</button>
                                @endif
                              @endif
                            </td>
                            <td>
                              <a href="{{route('admin.pendaftar.show',$item->id)}}" class="badge badge-primary">Detail</a>
                              <a href="{{route('admin.pendaftar.edit',$item->id)}}" class="badge badge-warning">Edit</a>
                              <button onclick="confirm('anda yakin ingin menghapus data') ? setAttribute('type','submit') : '' " type="button" form="remove{{$item->id}}"
                                class="badge badge-danger">Remove</button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </form>
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
      $('#table').DataTable();
    });
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