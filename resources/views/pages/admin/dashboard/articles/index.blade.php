@extends('pages.admin.dashboard.layouts.parent')

@section('title','Article')

@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Article</h4>
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
                <div class="card-title">Article Table</div>
                <a href="{{route('admin.article.create')}}" class="btn btn-primary float-end text-white">Create New</a>
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
                      <th>Title</th>
                      {{-- <th>Photo</th> --}}
                      <th>Category</th>
                      <th>Author</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($article as $index => $item)
                      <tr>
                        <td>{{$index + $article->firstItem()}}</td>
                        <td>{{$item->title}}</td>
                        {{-- <td><img src="{{ asset('storage/' . $item['image'])}}" style="width:200px;height:200px" class="rounded-0" alt=""></td> --}}
                        <td>
                          @if ($item->category)
                            {{$item->category->name}}
                          @else
                            Tidak Ada Category
                          @endif
                        </td>
                        <td>{{$item->user->name}}</td>
                        <td>
                          <a href="{{route('admin.article.show',$item->slug)}}" class="badge badge-primary">Show</a>
                          <a href="{{route('admin.article.edit',$item->slug)}}" class="badge badge-warning">Edit</a>
                          <form action="{{route('admin.article.delete',$item->id)}}" class="d-inline" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="badge badge-danger border-0">Delete</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$article->links()}}
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>
</div>
@endsection