@extends('pages.admin.dashboard.layouts.parent')

@section('title','Payment')

{{-- @push('add-styles')
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
@endpush --}}

@section('content')
    <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Pembayaran Siswa</h4>
        <div class="row">
          <div class="col-md-12">
            <div class="card rounded-4">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="card-title">Daftar Pembayaran Siswa</div>
                  <button class="btn btn-danger rounded-4 ms-2 float-end" onclick="destroy(event)">Delete</button>
                </div>
              </div>
              <div class="card-body">
                <div class="d-block">
                  <form action="" id="form1" name="form1" method="POST">
                    @csrf
                  <table class="table table-bordered data" id="table">
                    <thead>
                      <tr>
                        <th><input type="checkbox" name="select_all" class="select_all" id="select_all"></th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Nomor HP</th>
                        <th>Invoice</th>
                        {{-- <th>Status</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($payment as $index => $item)
                      <tr>
                        <td><input type="checkbox" name="id[{{$item->payment->id}}]" class="checkbox1" value="{{$item->payment->id}}"></td>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->nomor}}</td>
                        <td>
                          @if ($item->payment->status == 'pending')
                            <button type="button" class="badge badge-warning border-0">{{$item->payment->status}}</button>
                          @elseif($item->payment->status == 'berhasil')
                            <button type="button" class="badge badge-success border-0">{{$item->payment->status}}</button>
                          @elseif($item->payment->status == 'expired')
                            <button type="button" class="badge badge-danger border-0">{{$item->payment->status}}</button>
                          @endif
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
          document.form1.action = "/admin/payment/delete-all"
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
@endpush
