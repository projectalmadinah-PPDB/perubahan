@extends('pages.admin.dashboard.layouts.parent')

@section('title','Document')

@section('content')
  <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Document</h4>
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
                  <div class="card-title">Document Table</div>
                  <a href="{{route('admin.document.create')}}" class="btn btn-primary float-end text-white">Create New</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <input type="text" class="form-control w-25 mb-3" name="search">
                  <div>
                    <button class="btn btn-primary" type="submit">Find</button>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Kartu Keluarga</th>
                        <th>Ijazah</th>
                        <th>Akta</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($document as $index => $item)
                        <tr>
                          <td>{{$index + $document->firstItem()}}</td>
                          <td>{{$item->user->name}}</td>
                          <td><button class=" border-0 badge  {{$item->kk ? 'badge-success' : 'badge-danger'}}">{!!$item->kk ? '&#x2713;' : '&#x2715;'!!}</button></td>
                          <td><button class=" border-0 badge  {{$item->ijazah ? 'badge-success' : 'badge-danger'}}">{!!$item->ijazah ? '&#x2713;' : '&#x2715;'!!}</button></td>
                          <td><button class=" border-0 badge  {{$item->akta ? 'badge-success' : 'badge-danger'}}">{!!$item->akta ? '&#x2713;' : '&#x2715;'!!}</button></td>
                          <td>
                            <a href="{{route('admin.document.show',$item->id)}}" class="badge badge-primary">Show</a>
                            <a href="{{route('admin.document.edit',$item->id)}}" class="badge badge-warning">Edit</a>
                            <form action="{{route('admin.document.destroy',$item->id)}}" method="post" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="badge badge-danger border-0">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="float-end">
                  {{$document->links()}}
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
@endsection