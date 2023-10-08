@extends('pages.admin.dashboard.layouts.parent')

@section('title','Article')

@push('add-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="/dists/assets/style.css"/>
<link rel="stylesheet" href="resources/css/output.css"/>
@endpush
@section('content')
<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <h4 class="page-title">Settings Home</h4>
      
      <div class="row">
        <div class="col-md-12">
          <div class="card rounded-4">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div class="card-title">Hero Section</div>
              </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.update.home') }}" method="post">
                  @csrf
                  @method('PUT')
                    <div class="mb-2">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" value="{{ $home->title }}" name="title" id="title" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                        <label for="image" class="form-label">Hero Image</label>
                        <img src="{{ 'storage/' . $home->image }}" alt="">
                        <input type="file" name="image" id="image" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                        <label for="desc" class="form-label">Deskripsi</label>
                        <textarea name="desc" id="desc" rows="5" class="form-control rounded-4">{{ $home->desc }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success rounded-4">Save</button>
                </form>
            </div>
          </div>
          <div class="card rounded-4">
            <div class="card-header">
                <div id="toolSection" class="d-flex justify-content-between">
                    <div class="card-title">List Section</div>
                    <button type="button" class="btn btn-primary addSectionBtn rounded-4">Add +</button>
                </div>
            </div>
            <div class="card-body mb-2" id="sectionContainer">
                @forelse ($sections as $index => $section)
                  <form class="@if ($index !== 0) mt-3 pt-3 border-top border-success @endif" action="{{ route('admin.section.update', $section->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="d-flex justify-content-start align-items-center gap-1">
                        <div class="bg-danger d-inline-block rounded-circle" style="width: 1rem; height: 1rem;"></div>
                        <span>Section <b>#{{ $loop->iteration }}</b></span>
                      </div>
                      <button type="button" form="deleteSection{{ $section->id }}" onclick="confirm('Yakin ingin menghapus section?') ? setAttribute('type', 'submit') : ''" class="btn btn-danger rounded-5 py-1">Delete Section</button>
                    </div>
                    <div class="mb-2">
                      <label for="title" class="form-label">Judul</label>
                      <input type="text" value="{{ $section->title }}" name="title" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="image" class="form-label">Hero Image</label>
                      <img src="{{ asset('storage/' . $section['image']) }}" class="w-25 mb-2 d-block rounded-4 border border-5 border-primary" draggable="false">
                      <input type="file" name="image" id="image" class="form-control rounded-4">
                    </div>
                    <div class="mb-2">
                      <label for="desc" class="form-label">Deskripsi</label>
                      <textarea name="desc" rows="3" class="form-control rounded-4">{{ $section->desc }}</textarea>
                    </div>
                    <div class="d-flex gap-2">
                      <button type="submit" class="btn rounded-4 btn-success">Save</button>
                      <a href="javascript:location.reload();" class="btn rounded-4 btn-warning cancelBtn" title="Buat Section Baru">Cancel</a>
                    </div>
                  </form>
                  <form id="deleteSection{{ $section->id }}" action="{{ route('admin.section.delete', $section->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                  </form>
                @empty
                    <script>
                      document.addEventListener('DOMContentLoaded', function() {
                          var newSectionForm = document.getElementById('newSectionTemplate').cloneNode(true);
                          newSectionForm.removeAttribute('style');
                          document.getElementById('sectionContainer').appendChild(newSectionForm);
                      });
                    </script>
                @endforelse
              </div>
            </div>
            
            <!-- Kode Template Form Baru -->
            <div id="newSectionTemplate" class="mt-1" style="display:none;">
              <form action="{{ route('admin.section.create') }}" method="post">
                @csrf
                @method('post')
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-start align-items-center gap-1">
                        <div class="bg-danger d-inline-block rounded-circle" style="width: 1rem; height: 1rem;"></div>
                        <span>Section Baru</span>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" value="{{ old('title') }}" name="title" class="form-control rounded-4">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="image" class="form-label">Hero Image</label>
                    <input type="file" name="image" class="form-control rounded-4" accept="image/*">
                    @error('file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="desc" class="form-label">Deskripsi</label>
                    <textarea name="desc" rows="3" class="form-control rounded-4">{{ old('desc') }}</textarea>
                    @error('desc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn rounded-4 btn-success">Save</button>
                    <a href="javascript:location.reload();" class="btn rounded-4 btn-warning cancelBtn" title="Buat Section Baru">Cancel</a>
                </div>
            </form>
          </div>
            
          <script>
              // Code JavaScript untuk menangani event klik tombol "Add +"
              document.querySelector('.addSectionBtn').addEventListener('click', function() {
                  // Clone template form baru
                  var newSectionForm = document.getElementById('newSectionTemplate').cloneNode(true);
                  // Hilangkan atribut style "display:none;" dari form baru
                  newSectionForm.removeAttribute('style');
                  newSectionForm.setAttribute('class', 'mt-3 border-top pt-3 border-success');
                  // Tambahkan form baru ke dalam kontainer section
                  document.getElementById('sectionContainer').appendChild(newSectionForm);

                  this.disabled = true;
              });

          </script>
        
          
        </div> 
      </div>
    </div>
  </div>
</div>
@endsection
@push('add-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function(){
    $('#table').DataTable();
  });
</script>
@if (session('success'))
  <script>
    toastr.options = {
      "progressBar" : true,
      "closeButton" : true
    }
    toastr.success("{{ session('success') }}");
  </script>
@elseif(session('delete'))
<script>
  toastr.options = {
    "progressBar" : true,
    "closeButton" : true
  }
  toastr.error("{{ session('delete') }}");
</script>
@elseif(session('edit'))
<script>
  toastr.options = {
    "progressBar" : true,
    "closeButton" : true
  }
  toastr.warning("{{ session('edit') }}");
</script>
@endif
@endpush