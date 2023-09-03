@extends('pages.admin.dashboard.layouts.parent')

@section('title' , 'Create Article')

@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Forms</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Base Form Control</div>
            </div>
            <form action="{{route('admin.article.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="Title">Title</label>
                  <input type="text" class="form-control"  name="title" placeholder="Enter Title">
                </div>
                <div class="form-group">
                  <label for="email">Desc</label>
                  <textarea name="desc" id="" cols="30" rows="2" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label for="email">Category</label>
                  <select name="category_id" id="" class="form-select">
                    <option value="" disabled selected>Pilih Category Informasi</option>
                    @foreach ($category as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="email">Image</label>
                  <input type="file" class="form-control" name="image">
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