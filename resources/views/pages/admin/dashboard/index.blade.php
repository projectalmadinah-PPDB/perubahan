@extends('pages.admin.dashboard.layouts.parent')

@section('title' , 'Dashboard')
@push('add-styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx1 = document.getElementById('chart').getContext('2d');
        const userChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: {!! json_encode($datasets) !!}
            },
        });

        const ctx2 = document.getElementById('myChart').getContext('2d');
        Chart.defaults.backgroundColor = '#9BD0F5';
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Pendaftar', 'Peserta', 'Informasi', 'Lulus'],
                datasets: [{
                    label: 'Seluruh Data',
                    data: [{{$users->count()}}, {{$student->count()}}, {{$informasi->count()}}, {{$lulus->count()}}],
                    borderColor: ["#7C81AD","#141E46","#F4E869","#D83F31",],
                    backgroundColor: ["#7C81AD","#141E46","#F4E869","#D83F31",]
                }]
            },
            options: {
                scales: {
                    y: {
                        display: true,
                        stacked: true,
                        ticks: {
                            beginAtZero: true,
                            steps: 10,
                            stepValue: 5,
                            min: 0,
                            max: 100,
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Dashboard</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-stats rounded-4 card-success">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Jumlah Uang Pendaftaran</p>
                                        <h4 class="card-title">Rp {{ number_format($uang) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats rounded-4 card-warning">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="la la-users"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Pendaftar</p>
                                        <h4 class="card-title">{{ $users->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats rounded-4 card-success">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="la la-bar-chart"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Peserta</p>
                                        <h4 class="card-title">{{$student->count()}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats rounded-4 card-danger">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="la la-newspaper-o"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Informasi</p>
                                        <h4 class="card-title">{{$informasi->count()}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats rounded-4 card-primary">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="la la-check-circle"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Lulus</p>
                                        <h4 class="card-title">{{$lulus->count()}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
                <div class="col-md-12">
                    <div class="card card-tasks rounded-4">
                        <div class="card-body">
                            <canvas id="chart"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
                        {{-- <script>
                            const ctx = document.getElementById('chart').getContext('2d');
                            const userChart = new Chart(ctx,{
                                type:'bar',
                                data:{
                                    labels: {!! json_encode($labels) !!},
                                    datasets: {!! json_encode($datasets) !!}
                                },
                            });
                        </script> --}}
                            
                        </div>
                        </div>
                    </div>
            </div>
            <div class="container">
                <div class="row ms-3">
                    <div class="col-md-6">
                        <div class="card px-5">
                            <div style="height: 580px;width:100%;">
                                <h3 class="font-semibold text-secondary">Seluruh Data</h3>
                                <canvas id="myChart" style="height: 200rem;margin-top:50px"></canvas>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-tasks rounded-4">
                            <div class="card-header ">
                                <h4 class="card-title">Pendaftar Baru</h4>
                                <p class="card-category">Pendaftar Terbaru Tahun {{ $generations->generasi }}</p>
                            </div>
                            <div class="card-body ">
                                <div class="table-full-width">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                {{-- <th>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input  select-all-checkbox" type="checkbox" data-select="checkbox" data-target=".task-select">
                                                            <span class="form-check-sign"></span>
                                                        </label>
                                                    </div>
                                                </th> --}}
                                                <th>Nama</th>
                                                <th>Status Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users->take(7) as $item)
                                            <tr>
                                                {{-- <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input task-select" type="checkbox">
                                                            <span class="form-check-sign"></span>
                                                        </label>
                                                    </div>
                                                </td> --}}
                                                <td>{{$item->name}}</td>
                                                <td>
                                                    @if (!$item->payment)
                                                        <a href="" class="badge badge-danger">Belum Bayar</a>
                                                    @elseif($item->payment->status == 'berhasil')
                                                        <a href="" class="badge badge-success">Lunas</a>
                                                    @elseif($item->payment->status == 'pending')
                                                        <a href="" class="badge badge-warning">Transaksi</a>
                                                    @elseif($item->payment->status == 'expired')
                                                        <a href="" class="badge badge-danger">Expire</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <div class="stats">
                                    @foreach ($users as $user)
                                        @if($loop->last)
                                            {{ $user->created_at }}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-tasks rounded-4">
                            <div class="card-header ">
                                <h4 class="card-title">Calon Siswa {{ $generations->generasi }}</h4>
                                <p class="card-category">Calon Siswa {{ $generations->generasi }}</p>
                            </div>
                            <div class="card-body ">
                                <div class="table-full-width">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                {{-- <th>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input  select-all-checkbox" type="checkbox" data-select="checkbox" data-target=".task-select">
                                                            <span class="form-check-sign"></span>
                                                        </label>
                                                    </div>
                                                </th> --}}
                                                <th>Nama</th>
                                                <th>Status Test</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lulus as $item)
                                            <tr>
                                                {{-- <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input task-select" type="checkbox">
                                                            <span class="form-check-sign"></span>
                                                        </label>
                                                    </div>
                                                </td> --}}
                                                <td>{{$item->name}}</td>
                                                <td>
                                                    <a href="" class="badge badge-success border-0">{{$item->status}}</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <div class="stats">
                                    @foreach ($users as $user)
                                        @if($loop->first)
                                            {{ $user->created_at }}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="http://www.themekita.com">
                            ThemeKita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Help
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://themewagon.com/license/#free-item">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                2018, made with <i class="la la-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
            </div>				
        </div>
    </footer>
</div>
@endsection

