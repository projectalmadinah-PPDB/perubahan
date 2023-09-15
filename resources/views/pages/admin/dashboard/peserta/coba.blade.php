@extends('pages.admin.dashboard.layouts.parent')

@section('title','coba')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cobain</div>
                    
                    <div class="card-body">
                        {{-- <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pilih Opsi
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Opsi 1</a>
                                <a class="dropdown-item" href="#">Opsi 2</a>
                                <a class="dropdown-item" href="#">Opsi 3</a>
                                <a class="dropdown-item" href="#">Opsi 4</a>
                            </div>
                        </div> --}}
                        <button class="btn btn-primary" onclick="edit()">Ubah Data</button>
                        <form action="" name="form1" id="form1" method="POST">
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" class="select_all" id="select_all"></th>
                                        <th>Nama</th>
                                        <th>Nomor</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                    <tr>
                                        <td><input type="checkbox" name="id[{{$item->id}}]" id="" class="checkbox1" value="{{$item->id}}"></td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->user->nomor}}</td>
                                        <td>{{$item->status}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('add-script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#select_all').on('click',function(){
            if(this.checked){
                $('.checkbox1').each(function(){
                    this.checked = true;
                })
            }else{
                $('.checkbox1').each(function(){
                    this.checked = false;
                })
            }
        })

        $('.checkbox1'),on('click',function(){
            if($('.checkbox1:checked').length == $('.checkbox1').length){
                $('#select_all').prop('checked',true)
            }else{
                $('#select_all').prop('checked',false)
            }
        })
    });

    function edit() {
        document.form1.action = "/admin/peserta/coba/edit"
        document.form1.submit()
    }
</script>
@endpush