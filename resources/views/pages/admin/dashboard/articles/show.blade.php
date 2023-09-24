@extends('pages.admin.dashboard.layouts.parent')

@section('title','Article')

@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Article</h4>
      <div class="row">
        <div class="col-md-12">
          
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div class="card-title">Article Table</div>
                <a href="{{ route('admin.article.edit', $articles->slug) }}" class="btn btn-primary rounded-4">Edit</a>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <div class="">
                  <img src="{{ asset('storage/' . $articles['image'])}}" style="width:300px;height:220px" class="rounded-0" alt="">
                </div>
                <div class="ms-3 w-100">
                  <div class="mb-2">
                    <label for="" class="font-bold form-label">TITLE : </label>
                    <input type="text" class="form-control" value="{{$articles->title}}">
                  </div>
                  <div class="mb-2">
                    <label for="" class="font-bold form-label">Desc : </label>
                    <textarea type="text" class="form-control" value="">{{$articles->desc}}</textarea>
                  </div>
                  <div class="mb-2">
                    <label for="" class="font-bold form-label">Category : </label>
                    <input type="text" class="form-control" value="{{$articles->category ? $articles->category->name : 'Tidak Ada Category'}}">
                  </div>
                  <div class="mb-2">
                    <label for="" class="font-bold form-label">Author : </label>
                    <input type="text" class="form-control" value="{{$articles->user->name}}">
                  </div>
                  <div>
                    <a href="{{route('admin.article.index')}}" class="btn btn-primary">Back</a>
                  </div>
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