@extends('pages.admin.dashboard.layouts.parent')

@section('title','Document')

@section('content')
  <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Dokumen</h4>
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
                  <div class="card-title">Daftar Dokumen</div>
                  {{-- <a href="{{route('admin.document.create')}}" class="btn btn-primary float-end text-white rounded-4">Tambah +</a> --}}
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
                          @foreach ($document as $index => $item)
                          <tr>
                            <td><input type="checkbox" name="id[{{$item->id}}]" class="checkbox1" value="{{$item->id}}"></td>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->user->nomor}}</td>
                            <td><button class="badge badge-success border-0">{{$item->status}}</button></td>
                            <td>
                              <a href="{{ route('admin.document.show', $item->user->id) }}" class="badge badge-primary border-0">
                                Detail
                              </a>
                              <button type="button" class="badge badge-warning border-0" data-bs-toggle="modal" data-bs-target="#exampleModall">
                                Verify
                              </button>
                              <form action="{{route('admin.document.destroy',$item->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge badge-danger border-0">
                                  Delete
                                </button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </form>
                  @foreach ($document as $item)
                    <form action="" method="post">
                      @csrf
                      @method('PUT')
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <label for="status">Status</label>
                              <select name="status" id="status" class="form-select">
                                  <option disabled selected>Pilih Status</option>
                                  <option value="Wawancara">Wawancara</option>
                                  <option value="Gagal">Gagal</option>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" 
  integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" 
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
      });

      $('.checkbox1'),on('click',function(){
        if($('.checkbox1:checked').length == $('.checkbox1').length){
          $('#select_all').prop('checked',true)
        }else{
          $('#select_all').prop('checked',false)
        }
        })
      });
      
      function edit() {
      if ($('.checkbox1').is(':checked')) {
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
            // Mengarahkan formulir ke rute yang tepat dengan metode POST
            document.form1.action = "";
            document.form1.submit();
          }
        })
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Select Data Yang Ingin Di Edit masal',
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
      Swal.fire(
                'Edited!',
                'Berhasil Edit Massal',
                'success'
              )
    </script>
  @endif
@endpush