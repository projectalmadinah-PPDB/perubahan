@extends('pages.admin.dashboard.layouts.parent')

@section('title','Lolos')

@section('content')
    <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Siswa Lolos</h4>
        <div class="row">
          <div class="col-md-12">
            <div class="card rounded-4">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="card-title">Daftar Lolos</div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-primary me-2 rounded-4" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    data-bs-whatever="@mdo" >Ubah Status</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form id="form2" name="form2" method="POST">
                              @csrf
                              @method('PATCH')
                      
                              <div class="form-group">
                                  <label for="status">Status Santri</label>
                                  <select name="status" id="status" class="form-select">
                                    <option value="Belum" disabled selected>Pilih Status</option>
                                      <option value="Wawancara">Wawancara</option>
                                      <option value="Gagal">Gagal</option>
                                  </select>
                              </div>
                      
                              @foreach ($lolos as $index => $item)
                              <input type="hidden" name="ids[]" value="{{ $item->id }}">
                              @endforeach
                      
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="edit(event)">Send message</button>
                              </div>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a href="{{route('admin.lolos.export')}}" class="btn btn-primary rounded-4">Export Excel</a>
                  </div>
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
                        <th>Nomor Hp</th>
                        <th>Status Kelulusan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($lolos as $index => $item)
                        <tr>
                          <td><input type="checkbox" name="id[{{$item->id}}]" class="checkbox1" value="{{$item->id}}"></td>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->nomor}}</td>
                          <td><button class="badge badge-success border-0">{{$item->status}}</button></td>
                          <td>
                            <form action="{{route('admin.lolos.update',$item->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="button" class="badge badge-warning border-0" data-bs-toggle="modal" data-bs-target="#exampleModall">
                              Edit Status
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <label for="email">Status</label>
                                    <select name="status" id="" class="form-select">
                                        <option disabled selected>Pilih Status</option>
                                        <option value="Wawancara" {{$item->status == 'Wawancara' ? 'selected' : ''}}>Wawancara</option>
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
          document.form2.action = "/admin/wawancara/massal"
          document.form2.submit()
          Swal.fire(
            'Edited!',
            'Your file has been Edit.',
            'success'
          )
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
@endif
@endpush