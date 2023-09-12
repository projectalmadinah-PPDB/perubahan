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
            <div class="card rounded-4">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="card-title">Daftar Peserta</div>
                  <div class="d-flex justify-content-between">
                    {{-- <button type="button" id="" class="btn btn-warning me-3">Edit Selected</button> --}}
                    
                    </a>
                </div>
                <!-- Modal Edit All -->
                <!-- Form modal Edit All -->
                  {{-- <a href="{{route('admin.document.create')}}" class="btn btn-primary float-end text-white">Create New</a> --}}
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

                <!-- Dropdown Action -->
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Choose Action
                  </button>
                  <div class="dropdown-menu" aria-labelledby="actionDropdown">
                      <a class="dropdown-item" href="#" id="actionEdit">Edit</a>
                      <a class="dropdown-item" href="#" id="actionDelete">Delete</a>
                      <!-- Tambahkan opsi lain yang Anda butuhkan di sini -->
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered data">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="select-all"></th>
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
                          <td><input type="checkbox" class="checkbox-item" value="{{ $item->id }}"></td>
                          
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
                          </form>
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
@push('add-script')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
        // Fungsi untuk menangani saat tombol "Action" di atas tabel diklik
        $('#actionButton').click(function() {
            // Dapatkan ID siswa yang dipilih
            var selectedIds = [];
            $('.checkbox-item:checked').each(function() {
                selectedIds.push($(this).val());
            });

            // Dapatkan tindakan yang dipilih dari dropdown
            var selectedAction = $('#actionDropdown').val();

            // Lakukan sesuai dengan tindakan yang dipilih
            if (selectedAction === 'edit') {
                // Lakukan tindakan edit
                // ...
            } else if (selectedAction === 'delete') {
                // Lakukan tindakan delete
                // ...
            }
        });
    });
  $(document).ready(function() {
            // Event handler untuk tombol "Select All"
            $('#select-all').change(function() {
                var checkboxes = $('.checkbox-item'); // Mengambil semua checkbox item
                checkboxes.prop('checked', this.checked); // Mengatur status semua checkbox item sesuai dengan "Select All"
            });
        });
        $(document).ready(function() {
        // Mengatur event handler untuk tombol "Delete All"
        $('#update-all-button').click(function() {
            var selectedIds = [];

            // Loop melalui checkbox item
            $('.checkbox-item:checked').each(function() {
                selectedIds.push($(this).data('id'));
            });

            if (selectedIds.length > 0) {
                // Menyiapkan data yang akan dikirim dalam permintaan AJAX
                var data = {
                    _token: '{{ csrf_token() }}',
                    _method: 'PUT',
                    selectedIds: selectedIds.join(',')
                };

                // Kirim permintaan AJAX untuk menghapus item yang dipilih
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.peserta.edit-all') }}',
                    data: data,
                    success: function(response) {
                        // Tanggapi hasil penghapusan atau tampilkan pesan sukses
                        console.log(response.message);
                        // Refresh halaman atau lakukan tindakan lain yang sesuai
                        window.location.reload(); // Refresh halaman
                    },
                    error: function(error) {
                        console.error('Terjadi kesalahan:', error);
                    }
                });
            } else {
                alert('Pilih setidaknya satu item untuk dihapus.');
            }
        });
    });
  </script>
@endpush