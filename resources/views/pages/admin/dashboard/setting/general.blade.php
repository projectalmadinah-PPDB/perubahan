@extends('pages.admin.dashboard.layouts.parent')

@section('title','General Settings')

@section('content')
<div class="main-panel">
	<div class="content">
		<div class="container-fluid">
			<h4 class="page-title">Pengaturan Umum</h4>
      @if (session('tersimpan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Yeyy!</strong> Perubahan kamu berhasil disimpan.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
			<div class="row">
				<div class="col-md-12">
					<div class="card rounded-4">
						<div class="card-header">
              <div class="card-title">Profil Sekolah</div>
            </div>
            <form action="{{ route('admin.settings.update_general') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="school_name">Nama Sekolah</label>
                            <input autocomplete="off" value="{{ $generals->school_name }}" type="text" class="form-control rounded-4"  name="school_name" placeholder="Nama Lengkap Anda">
                          </div>
                          <div class="form-group">
                            <label for="school_logo">Logo Sekolah</label>
                            <img src="{{ asset('storage/' . $generals['school_logo']) }}" alt="" class="w-25 mb-2 d-block rounded-4 border border-5 border-primary" draggable="false">
                            <input name="school_logo" class="form-control rounded-4" type="file">
                          </div>
                          <div class="form-group">
                            <label for="school_phone">Nomor Telepon Sekolah</label>
                            <input autocomplete="off" value="{{ $generals->school_phone }}" name="school_phone" class="form-control rounded-4" type="tel">
                          </div>
                          <div class="form-group">
                            <label for="school_email">Email Sekolah</label>
                            <input autocomplete="off" value="{{ $generals->school_email }}" name="school_email" class="form-control rounded-4" type="email">
                          </div>
                          <div class="form-group">
                            <label for="school_address">Alamat Sekolah</label>
                            <textarea name="school_address" class="form-control rounded-4">{{ $generals->school_address }}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="desc">Deskripsi Singkat</label>
                            <textarea name="desc" class="form-control rounded-4" type="email">{{ $generals->desc }}</textarea>
                          </div>
                        </div>
                      </div>
                    <div class="card-action">
                      <button id="btnSubmit" class="btn btn-success px-4" type="button">Submit</button>
                    </div>  
                </div>
                
                <script>
                  const inputs = document.querySelectorAll('input, textarea');
                  const btnSubmit = document.querySelector('#btnSubmit');

                  inputs.forEach(input => {
                    input.addEventListener('change', function () {
                      btnSubmit.setAttribute('type', 'submit');
                    })
                  })
              </script>
            </form>
						</div>
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>
@endsection