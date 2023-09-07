@extends('pages.admin.dashboard.layouts.parent')

@section('title','Article')

@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Question</h4>
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
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div class="card-title">Q&A Table</div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Edit Profile
                 </button>
                 
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
              <form action="{{route('admin.article.index')}}" method="get">
                @csrf
                @method('get')
                <div class="d-flex">
                  <input type="text" name="search" class="form-control w-25 mb-3" >
                  <div>
                    <button class="btn btn-primary" type="submit">Find</button>
                  </div>
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
                            <form action="{{route('admin.question.active',$item->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                @if ($item->active == 'off')
                                <button class="badge badge-primary border-0" type="submit" name="active" value="on">On</button>
                                @else
                                <button class="badge badge-danger border-0" type="submit" name="active" value="off">Off</button>
                                @endif
                            </form>
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