@extends('pages.admin.dashboard.layouts.parent')

@section('title','Generasi')
@push('add-styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Generasi</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="card rounded-4">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div class="card-title">Daftar Generasi</div>
                <button type="button" class="btn btn-primary rounded-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah +</button>
                 
                 <!-- Modal -->
                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <form action="{{route('admin.generasi.create')}}" method="post">
                     @csrf
                     @method('POST')
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                             <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                             <div class="mb-3">
                                 <label for="" class="form-label">Generasi</label>
                                 <input type="number" name="generasi" class="form-control" >
                             </div>
                             <div class="mb-3">
                                 <label for="" class="form-label">Mulai Generasi</label>
                                 <input type="date" name="start_at" class="form-control" >
                             </div>
                             <div class="mb-3">
                                <label for="" class="form-label">Berakhir Generasi</label>
                                <input type="date" name="end_at" class="form-control" >
                            </div>
                             </div>
                             <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Save</button>
                             </div>
                         </div>
                     </div>
                     </form>
                 </div>
              </div>
            </div>
            <div class="card-body">
              <form action="" method="get">
                @csrf
                <div class="position-relative w-25" style="display: inline-flex">
                  <input type="text" name="search" class="form-control w-100 mb-3 rounded-4" >
                  <button class="btn btn-primary rounded-4 position-absolute top-0 end-0" type="submit">Find</button>
                </div>
                </form>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Generasi</th>
                      {{-- <th>Photo</th> --}}
                      <th>Mulai</th>
                      <th>Berakhir</th>
                      <th>Status Generasi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($generasi as $index => $item)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$item->generasi}}</td>
                        <td>{{$item->start_at}}</td>
                        <td>{{$item->end_at}}</td>
                        <td>
                            @if ($item->status == 'off')
                                <button class="badge badge-danger border-0">{{$item->status}}</button>
                            @else
                                <button class="badge badge-primary border-0">{{$item->status}}</button>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="badge badge-warning border-0" data-bs-toggle="modal" data-bs-target="#exampleModall">
                                Edit
                             </button>
                             
                             <!-- Modal -->
                             <div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <form action="{{route('admin.generasi.update',$item->id)}}" method="post">
                                 @csrf
                                 @method('PUT')
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                         <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                         <div class="mb-3">
                                             <label for="" class="form-label">Generasi</label>
                                             <input type="number" name="generasi" class="form-control" value="{{$item->generasi}}">
                                         </div>
                                         <div class="mb-3">
                                             <label for="" class="form-label">Mulai Generasi</label>
                                             <input type="date" name="start_at" class="form-control" value="{{$item->start_at}}">
                                         </div>
                                         <div class="mb-3">
                                            <label for="" class="form-label">Berakhir Generasi</label>
                                            <input type="date" name="end_at" class="form-control" value="{{$item->end_at}}">
                                        </div>
                                         </div>
                                         <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                         <button type="submit" class="btn btn-primary">Save</button>
                                         </div>
                                     </div>
                                 </div>
                                 </form>
                             </div>
                            @if ($item->where('status', 'on')->count() > 0)
                            <div class="dropdown d-inline">
                              <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                              </a>
                            
                              <div class="dropdown-menu" aria-labelledby="customDropdown">
                                <form action="{{route('admin.generasi.status',$item->id)}}" method="post">
                                  @csrf
                                  @method('PUT')
                                  <div class="d-flex flex-wrap">
                                    <button type="submit" name="status" value="on" class="border-0 bg-success w-100 text-bold text-white" >On</button>
                                    <button name="status" type="submit" class="border-0 bg-danger w-100 text-bold text-white" value="off">Off</button>
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
                            @else
                            <div class="dropdown d-inline">
                              <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                              </a>
                            
                              <div class="dropdown-menu" aria-labelledby="customDropdown">
                                <form action="{{route('admin.generasi.status',$item->id)}}" method="post">
                                  @csrf
                                  @method('PUT')
                                  <div class="d-flex flex-wrap">
                                    <button type="submit" name="status" value="on" class="border-0 bg-success w-100 text-bold text-white" >On</button>
                                    <button name="status" type="submit" class="border-0 bg-danger w-100 text-bold text-white" value="off">Off</button>
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
                            @endif
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                  </tbody>
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