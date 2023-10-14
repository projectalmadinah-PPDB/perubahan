@extends('pages.admin.dashboard.layouts.parent')

@section('title','Coba aja')



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
                      <div class="card-title"></div>
                        <div class="card-body">
                                @livewire('pembayaran-table')
                        </div>
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
@endsection
{{-- @push('add-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#table').DataTable();
    });
  </script>
@endpush --}}