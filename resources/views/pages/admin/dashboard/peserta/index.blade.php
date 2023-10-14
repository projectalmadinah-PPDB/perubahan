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
                <div class="d-flex justify-content-between align-items-center">
                  <div class="card-title">
                    Daftar Peserta
                    <small class="d-block">daftar user yang telah melakukan pembayaran</small>
                  </div>
                  <div class="d-flex justify-content-between">
                    <a href="{{route('admin.peserta.export')}}" class="btn btn-primary rounded-4 me-2">Export Excel</a>
                    <button type="button" class="btn rounded-4 btn-outline-primary" 
                    onclick="edit(event)">Ubah Status</button>
                    <button class="btn btn-danger ms-2 float-end rounded-4" onclick="destroy(event)">Delete</button>
                </div>
                </div>
              </div>
              <div class="card-body">
                <!-- Tombol "Action" di atas tabel -->  
                <div class="table-responsive">
                  <form action="" name="form1" id="form1" method="POST">
                    @csrf
                  <table class="table table-bordered data" id="table">
                    <thead>
                      <tr>
                        <th style="width: 25px"><input type="checkbox" name="select_all" class="select_all" id="select_all"></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Nomor Hp</th>
                        <th>Biodata</th>
                        <th>Status Pembayaran</th>
                        <th>Status Tes</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $index => $item)
                      
                        <tr>
                          <td><input type="checkbox" name="id[{{$item->id}}]" class="checkbox1" value="{{$item->id}}"></td>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->nomor}}</td>

                          @if($item->student && $item->document)
                          <td>
                            <a href="{{ route('admin.peserta.show', $item->id) }}" class="badge badge-success border-0">Lengkap</a>
                          </td>
                          @elseif($item->student && !$item->document)
                          <td>
                            <a href="{{ route('admin.peserta.show', $item->id) }}" class="badge badge-info border-0">Tidak Lengkap</a>
                          </td>
                          @else
                          <td>
                            <a href="{{ route('admin.peserta.show', $item->id) }}" class="badge badge-info border-0">Tidak Ada</a>
                          </td>
                          @endif

                          <td>
                            @if (!$item->payment)
                              <button class="badge badge-info border-0">Tidak Ada</button>
                            @else
                              @if ($item->payment->status == 'berhasil')
                                <button class="badge badge-success border-0">Sukses</button>
                              @elseif($item->payment->status == 'expired')
                              <button class="badge badge-info border-0">{{$item->payment->status}}</button>
                              @else
                              <button class="badge badge-warning border-0">{{$item->payment->status}}</button>
                              @endif
                            @endif
                          </td>

                          <td>
                            @if ($item->status == 'Belum')
                                <a class="badge badge-info border-0 text-white">Tidak Ada Status</a>
                            @elseif($item->status == 'Gagal')
                                <a class="badge badge-info border-0 text-white">Tidak Lulus</a>
                            @elseif($item->status == 'Wawancara')
                                <a class="badge badge-primary border-0 text-white">Wawancara</a>
                            @elseif($item->status == 'Lulus')
                                <a class="badge badge-success border-0 text-white">Lulus</a>
                            @endif
                          </td>
                          </form>
                          <td>
                            <a href="{{route('admin.peserta.show',$item->id)}}" class="badge badge-primary">Detail</a>
                            <a href="{{route('admin.peserta.edit',$item->id)}}" class="badge badge-warning">Edit</a>

                            <form action="{{route('admin.peserta.destroy',$item->id)}}" method="post" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="badge badge-danger border-0">Delete</button>
                            </form>
                            
                            {{-- add-action --}}
                            <div class="dropdown d-inline">
                              <a class="dropdown-toggle" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                              </a>
                            
                              <div class="dropdown-menu py-0 rounded-4 overflow-hidden mb-2" aria-labelledby="customDropdown">
                                <form action="{{route('admin.pengecekan',$item->id)}}" method="post">
                                  @csrf
                                  @method('POST')
                                  <div class="d-flex flex-column">
                                    <button name="status" type="submit" class="border-0 bg-warning w-100 text-bold text-white" value="Wawancara">Lanjut Wawancara</button>
                                    <button type="submit" name="status" value="Gagal" class="border-0 bg-danger w-100 text-bold text-white" >Gagal</button>
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

    function edit(event) {
        // document.form1.action = "/admin/peserta/coba/edit"
        // document.form1.submit()
        event.preventDefault()
        if($('.checkbox1').is(':checked')){
          Swal.fire({
        title: 'Kamu Yakin?',
        text: "Yakin Ingin Mengedit Banyak Data",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Update it!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.form1.action = "/admin/peserta/coba/edit"
          document.form1.submit()
        }
      })
      }else{
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Pilih data yang ingin Dihapus Massal',
      })
      }
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
            'Beberapa data berhasil dihapus.',
            'success'
          )
        }
      })
      }else{
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Pilih data yang ingin dihapus Massal',
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
@elseif(session('edit_massal'))
<script>
  Swal.fire(
            'Edited!',
            'Berhasil Edit Massal',
            'success'
          )
</script>
@endif
@endpush