@extends('pages.admin.dashboard.layouts.parent')

@section('title','edit coba')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Update Data
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.lolos.edit_massal') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                            
                                    <div class="form-group">
                                        <label for="status">Status Siswa</label>
                                        <select name="status" id="status" class="form-select">
                                            <option value="Belum" disabled>Belum Ada Status</option>
                                            <option value="Lulus">Lulus</option>
                                            <option value="Gagal">Gagal</option>
                                        </select>
                                    </div>
                            
                                    @foreach ($student as $index => $item)
                                    <input type="hidden" name="ids[]" value="{{ $item->id }}">
                                    @endforeach
                            
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm" type="submit">Update</button>
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