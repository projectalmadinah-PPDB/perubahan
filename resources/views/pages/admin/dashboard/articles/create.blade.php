@extends('pages.admin.dashboard.layouts.parent')

@section('title' , 'Create Article')
@push('add-styles')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
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
              <div class="card-title">Tambah Artikel</div>
            </div>
            <form action="{{route('admin.article.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="Title">Judul</label>
                  <input type="text" class="form-control rounded-4"  name="title" placeholder="Enter Title">
                </div>
                <div class="form-group">
                  <label for="email">Deskripsi</label>
                  <textarea name="desc" id="desc" cols="30" rows="2" class="form-control rounded-4"></textarea>
                </div>
                <div class="form-group">
                  <label for="email">Kategori</label>
                  <select name="category_id" id="" class="form-select rounded-4">
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    @foreach ($category as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="email">Gambar</label>
                  <input type="file" class="form-control rounded-4" name="image">
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
@push('add-script')
<script>
  ClassicEditor
      .create( document.querySelector( '#desc' ) )
      .catch( error => {
          console.error( error );
      } );
</script>
@endpush