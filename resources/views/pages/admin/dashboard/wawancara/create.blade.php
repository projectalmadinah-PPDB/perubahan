@extends('pages.admin.dashboard.layouts.parent')

@section('title' , 'Create Wawancara')
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
            <form action="{{ route('admin.wawancara.create.process',$wawancara->id) }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="">Tanggal Wawancara</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal">
                                @error('tanggal')
                                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                  </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                              <label for="">Waktu Wawancara</label>
                              <input type="time" class="form-control @error('jam') is-invalid @enderror" name="jam">
                              @error('jam')
                                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                  </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="">Link Wawancara</label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror" name="link">
                                @error('link')
                                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                  </div>
                                @enderror
                            </div>
                          </div>
                        <div class="card-action">
                      <button class="btn btn-success px-4" type="submit">Submit</button>
                      <a href="{{ route('admin.wawancara.index') }}" class="btn btn-warning" type="button">Back</a>
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