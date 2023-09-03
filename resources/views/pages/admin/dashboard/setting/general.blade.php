@extends('pages.admin.dashboard.layouts.parent')

@section('title','General Settings')

@section('content')
<div class="main-panel">
	<div class="content">
		<div class="container-fluid">
			<h4 class="page-title">Pengaturan Umum</h4>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
              <div class="card-title">Profil Sekolah</div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="school_logo">Nama Sekolah</label>
                            <input type="text" class="form-control"  name="school_name" placeholder="Nama Lengkap Anda" value="">
                          </div>
                          <div class="form-group">
                            <label for="school_logo">Logo Sekolah</label>
                            <input name="school_logo" class="form-control" type="file" value="">
                          </div>
                          <div class="form-group">
                            <label for="school_phone">Nomor Telepon Sekolah</label>
                            <input name="school_phone" class="form-control" type="number" value="">
                          </div>
                          <div class="form-group">
                            <label for="school_email">Email Sekolah</label>
                            <input name="school_email" class="form-control" type="email" value="">
                          </div>
                          <div class="form-group">
                            <label for="school_email">Alamat Sekolah</label>
                            <textarea name="school_email" class="form-control" type="email" value=""></textarea>
                          </div>
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
</div>
@endsection