@extends('pages.admin.dashboard.layouts.parent')

@section('title' , 'Dashboard')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Dashboard</h4>
            <div class="row">
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
<!-- 							<div class="col-md-3">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="la la-pie-chart text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Number</p>
                                        <h4 class="card-title">150GB</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="la la-bar-chart text-success"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Revenue</p>
                                        <h4 class="card-title">$ 1,345</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="la la-times-circle-o text-danger"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Errors</p>
                                        <h4 class="card-title">23</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="la la-heart-o text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Followers</p>
                                        <h4 class="card-title">+45K</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
                <div class="col-md-12">
                    <div class="card card-tasks rounded-4">
                        <div class="card-body">
                            <div style="height: 450px;width:100%">
                                <canvas id="myChart"></canvas>
                              </div>
                              
                              <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                              
                              <script>
                                const ctx = document.getElementById('myChart');
                                Chart.defaults.backgroundColor = '#9BD0F5';
                                new Chart(ctx, {
                                  type: 'line',
                                  data: {
                                    labels: ['Pendaftar', 'Peserta', 'Informasi','Lulus'],
                                    datasets: [{
                                      label: 'Seluruh Data',
                                      data: [{{$users->count()}}, {{$student->count()}}, {{$informasi->count()}},{{$lulus->count()}}],
                                      borderColor: ["#03A9F5"],
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
                              </script>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ms-3">
                <div class="col-md-6">
                    <div class="card card-tasks rounded-4">
                        <div class="card-header ">
                            <h4 class="card-title">Peserta Baru</h4>
                            <p class="card-category">Peserta 2024</p>
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
                                        @foreach ($users as $item)
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
                            <h4 class="card-title">Calon Siswa</h4>
                            <p class="card-category">Calon Siswa 2024</p>
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
                                    @if($loop->last)
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

