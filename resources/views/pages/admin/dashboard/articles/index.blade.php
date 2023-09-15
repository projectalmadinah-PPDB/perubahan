@extends('pages.admin.dashboard.layouts.parent')

@section('title','Article')

@push('add-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Artikel</h4>
      
      <div class="row">
        <div class="col-md-12">
          <div class="card rounded-4">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div class="card-title">Daftar Artikel</div>
                <a href="{{route('admin.article.create')}}" class="btn btn-primary float-end text-white rounded-4">Tambah +</a>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('admin.article.index')}}" method="get">
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
@else
<script>
  toastr.options = {
    "progressBar" : true,
    "closeButton" : true
  }
  toastr.warning("{{ session('edit') }}");
</script>
@endif
@endpush