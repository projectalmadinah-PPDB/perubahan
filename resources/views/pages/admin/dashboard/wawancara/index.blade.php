@extends('pages.admin.dashboard.layouts.parent')

@section('title','Wawancara')
@push('add-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Wawancara Siswa</h4>
        <div class="row">
          <div class="col-md-12">
            <div class="card rounded-4">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="card-title">Daftar Wawancara</div>
                    <button type="button" class="btn btn-primary rounded-4" onclick="edit(event)" >Ubah Status</button>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <form action="" name="form1" id="form1" method="POST">
                    @csrf
                  <table class="table table-bordered" id="table">
                    <thead>
                      <tr>
                        <th><input type="checkbox" name="select_all" class="select_all" id="select_all"></th>
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
                          <td><input type="checkbox" name="id[{{$item->id}}]" class="checkbox1" value="{{$item->id}}"></td>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->name}}</td>
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
                            @if (!$item->wawancara)
                              <a class="badge badge-primary" href="{{route('admin.wawancara.create',$item->id)}}">Isi Jadwal</a>
                            @else
                              <a class="badge badge-primary" href="{{route('admin.wawancara.create',$item->id)}}">Isi Jadwal</a>
                              <button type="button" class="badge badge-warning border-0" data-bs-toggle="modal" data-bs-target="#exampleModall">
                                Edit Status
                              </button>
                            @endif
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  </form>
                  @foreach ($data as $item)
                    <form action="{{route('admin.update.status',$item->id)}}" method="post">
                      @csrf
                      @method('PUT')
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Status</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <label for="email">Status</label>
                              <select name="status" id="" class="form-select">
                                  <option disabled selected>Pilih Status</option>
                                  <option value="Lulus" {{$item->status == 'Lulus' ? 'selected' : ''}}>Lulus</option>
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
                  @endforeach
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
          document.form1.action = "/admin/wawancara/edit"
          document.form1.submit()
        }
      })
      }else{
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Select Data Yang Ingin Di Edit Massal',
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