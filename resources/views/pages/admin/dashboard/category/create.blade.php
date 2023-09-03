@extends('pages.admin.dashboard.layouts.parent')

@section('title' , 'Create Article')

@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Category Forms</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Category Control</div>
            </div>
            <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="Title">Name Category</label>
                  <input type="text" class="form-control"  name="name" placeholder="Enter Category">
                </div>
              </div>
              <div class="card-action">
                <button class="btn btn-success" type="submit">Submit</button>
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