@extends('pages.admin.dashboard.layouts.parent')

@section('title','Create Document')

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
            <form action="{{route('admin.document.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleFormControlFile1">Kartu Keluarga <strong>*File PDF</strong></label>
                  <input type="file" class="form-control-file" name="kk" id="exampleFormControlFile1" accept=".pdf">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Ijazah <strong>*File PDF</strong></label>
                  <input type="file" class="form-control-file" name="ijazah" id="exampleFormControlFile1" accept=".pdf">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Akta <strong>*File PDF</strong></label>
                  <input type="file" class="form-control-file" name="akta" id="exampleFormControlFile1" accept=".pdf">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Rapor <strong>*File PDF</strong></label>
                  <input type="file" class="form-control-file" name="rapor" id="exampleFormControlFile1" accept=".pdf">
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