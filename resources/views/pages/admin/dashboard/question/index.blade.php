@extends('pages.admin.dashboard.layouts.parent')

@section('title','Question')
@push('add-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Q&A</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="card rounded-4">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div class="card-title">Daftar Q&A</div>
                <button type="button" class="btn btn-primary rounded-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah +</button>
                 
                 <!-- Modal -->
                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <form action="{{route('admin.question.create')}}" method="post">
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
                                 <label for="" class="form-label">Pertanyaan</label>
                                 <input type="text" name="question" class="form-control" >
                             </div>
                             <div class="mb-3">
                                 <label for="" class="form-label">Jawaban</label>
                                 <textarea type="text" name="answer" class="form-control" ></textarea>
                             </div>
                             </div>
                             <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Save Changes</button>
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
                      <th>Pertanyaan</th>
                      {{-- <th>Photo</th> --}}
                      <th>Jawaban</th>
                      <th>Status Aktif</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($question as $index => $item)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$item->question}}</td>
                        <td>{{$item->answer}}</td>
                        <td>{{$item->active}}</td>
                        <td>
                            <div class="d-flex">
                              <form action="{{route('admin.question.active',$item->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                @if ($item->active == 'off')
                                <button class="badge badge-primary border-0" type="submit" name="active" value="on">On</button>
                                @else
                                <button class="badge badge-danger border-0" type="submit" name="active" value="off">Off</button>
                                @endif
                            </form>
                            @if (!$item->answer)
                            <button type="button" class="badge badge-primary rounded-4 border-0" data-bs-toggle="modal" data-bs-target="#exampleModall">Jawab</button>
                            <div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <form action="{{route('admin.question.jawab',$item->id)}}" method="post">
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
                                          <label for="" class="form-label">Jawaban</label>
                                          <textarea type="text" name="answer" class="form-control" ></textarea>
                                      </div>
                                      </div>
                                      <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save Changes</button>
                                      </div>
                                  </div>
                              </div>
                              </form>
                          </div>
                            @else
                            @endif
                            </div>
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