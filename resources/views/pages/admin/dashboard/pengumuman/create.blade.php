@extends('pages.admin.dashboard.layouts.parent')

@section('title' , 'Create Biodata')
@push('add-styles')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
@endpush
@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Pengumuman</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="card rounded-4">
            <div class="card-header">
              <div class="card-title">Tambah Pengumuman</div>
            </div>
            <form action="{{route('admin.pengumuman.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control rounded-4"  name="title" 
                            placeholder="Judul pengumuman" value="{{ old('title') }}">
                          </div>
                          <div class="form-group">
                            <label for="title">Step</label>
                            <select name="step" id="" class="form-select">
                              <option value="Pembayaran">Pembayaran</option>
                              <option value="Test">Test</option>
                              <option value="Hasil">Hasil</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="desc">Deskripsi <span class="badge badge-danger border-0 py-1 mb-1 text-white">berlaku tag HTML</span></label>
                            <textarea name="desc" id="desc" rows="10" class="form-control rounded-4" 
                            placeholder="Deskripsi pengumuman">{{ old('desc') }}</textarea>
                          </div>
                    <div class="card-action">
                      <button class="btn btn-success px-4" type="submit">Submit</button>
                      <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-warning" type="button">Back</a>
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