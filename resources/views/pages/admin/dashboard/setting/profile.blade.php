@extends('pages.admin.dashboard.layouts.parent')

@section('title','Edit Profile')

@section('content')
<div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session('success')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
        @elseif(session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session('delete')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session('edit'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          {{session('edit')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="card-title">Profile</div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                       Edit Profile
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="{{route('admin.setting.profile.update',$profile->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$profile->name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{$profile->email}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password Lama</label>
                                    <input type="password" name="old_password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password Baru</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Confirm Password Baru</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-2">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{$profile->name}}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" value="{{$profile->email}}" disabled>
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