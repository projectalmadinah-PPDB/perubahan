@extends('pages.admin.dashboard.layouts.parent')

@section('title' , 'Create Article')

@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Kategori</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="card rounded-4">
            <div class="card-header">
              <div class="card-title">Tambah Kategori</div>
            </div>
            <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="Title">Nama Kategori</label>
                  <input type="text" class="form-control"  name="name" placeholder="category name">
                </div>
              </div>
              <div class="card-action">
                <button class="btn btn-success px-4" type="submit">Submit</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection