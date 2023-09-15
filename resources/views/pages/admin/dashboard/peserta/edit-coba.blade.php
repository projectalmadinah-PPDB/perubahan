@extends('pages.admin.dashboard.layouts.parent')

@section('title','edit coba')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Update Data
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.peserta.coba.update')}}" method="POST">
                            @csrf
                            @method('PATCH')

                            @foreach ($student as $index => $item)
                            <div class="form-group">
                                <label for="">Status Santri {{$item->name}}</label>
                                <input type="hidden" name="ids[]" value="{{$item->id}}">
                                {{-- <input type="text" name="status[]" value="{{$item->status}}" class="form-control" id=""> --}}
                                <select name="status[]" id="" class="form-select">
                                    <option {{ $item->status == 'Belum' ? 'disable' : '' }} >Belum Ada Status</option>
                                    <option value="Lulus" {{ $item->status == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                                    <option value="Wawancara" {{ $item->status == 'Wawancara' ? 'selected' : '' }}>Wawancara</option>
                                    <option value="Gagal" {{ $item->status == 'Gagal' ? 'selected' : '' }}>Gagal</option>
                                </select>
                            </div>
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
@endsection