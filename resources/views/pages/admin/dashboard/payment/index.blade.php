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
                </div>
              </div>
              <div class="card-body">
                <div class="d-block">
                  <table class="table table-striped data">
                    <thead>
                      <tr>			
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                        <th>Usia</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Malas Ngoding</td>
                        <td>Bandung</td>
                        <td>Web Developer</td>
                        <td>26</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Malas Ngoding</td>
                        <td>Bandung</td>
                        <td>Web Developer</td>
                        <td>26</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
                      <tr>				
                        <td>Andi</td>
                        <td>Jakarta</td>
                        <td>Web Designer</td>
                        <td>21</td>
                        <td>Aktif</td>
                      </tr>
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
  </div>
@endsection
@push('add-script')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
@endpush
