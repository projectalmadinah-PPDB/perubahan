@extends('pages.admin.dashboard.layouts.parent')

@section('title','Payment')

@push('add-styles')
  <style>
    .dataTables_filter input {
      border-radius: 2rem!important;
    }

    .dataTables_filter label {
      font-weight: bold!important;
    }
    
    .dataTables_length select {
      width: 60px!important;
      border-radius: 2rem!important;
    }

    .page-item {
      padding: 0!important;
      border: 0!important;
    }

    .page-item:hover {
      background: none!important;
      border: 0!important;
    }

    .page-item.active:hover a.page-link {
      background: #0067d5!important;
    }

    .page-item:active {
      box-shadow: none!important;
    }

    a.page-link {
      margin: 0px!important;
      padding: .3rem .7rem!important;
    }
  </style>
@endpush

@section('content')
    <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Pembayaran Siswa</h4>
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
                  <div class="card-title">Daftar Pembayaran Siswa</div>
                  <button type="button" class="btn btn-danger m-0" id="delete-all-button">Delete All</button>
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
                <div class="d-block">
                  <form id="my-form" method="post" action="{{ route('admin.delete-all') }}">
                    @csrf
                    @method('delete')
                  <table class="table data">
                    <thead>
                      <tr>
                        <th><input type="checkbox" name="" id="select-all"></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Nomor Hp</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($payment as $index => $item)
                      <tr>
                        <td><input type="checkbox" class="checkbox-item" data-id="{{$item->id}}"></td>
                        <td>{{$index + 1}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->user->nomor}}</td>
                        <td>{{$item->status}}</td>
                        <td></td>
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
  </div>
@endsection
@push('add-script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
            // Event handler untuk tombol "Select All"
            $('#select-all').change(function() {
                var checkboxes = $('.checkbox-item'); // Mengambil semua checkbox item
                checkboxes.prop('checked', this.checked); // Mengatur status semua checkbox item sesuai dengan "Select All"
            });
        });
        $(document).ready(function() {
        // Mengatur event handler untuk tombol "Delete All"
        $('#delete-all-button').click(function() {
            var selectedIds = [];

            // Loop melalui checkbox item
            $('.checkbox-item:checked').each(function() {
                selectedIds.push($(this).data('id'));
            });

            if (selectedIds.length > 0) {
                // Menyiapkan data yang akan dikirim dalam permintaan AJAX
                var data = {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE',
                    selectedIds: selectedIds.join(',')
                };

                // Kirim permintaan AJAX untuk menghapus item yang dipilih
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.delete-all') }}',
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
