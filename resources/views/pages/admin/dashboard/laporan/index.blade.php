@extends('pages.admin.dashboard.layouts.parent')

@section('title','Laporan')

@section('content')
    <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <h4 class="page-title">Laporan</h4>
        <div class="row">
          @foreach ($generasi as $item)
            <div class="col-md-3">
              <div class="card card-stats rounded-4 card-info">
                  <div class="card-body">
                      <div class="row">
                          <div class="">
                            <div class="me-2 text-center">
                              <h6 class="">Data Pendaftar Angkatan {{$item->generasi}}</h6>
                            </div>
                            <a href="{{route('admin.laporan.export',$item->id)}}" class="badge badge-primary fs-6 d-flex justify-content-center align-items-center">
                              Download
                              <span class="badge text-bg-primary border border-white ms-2">
                                <i class="bi bi-download"></i>
                              </span>
                            </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
        </div>
        {{-- diagram --}}
        <div class="row">
          {{-- <div class="col-12 col-md-8 px-2">
            <div class="card rounded-4">
              <div class="card-header">
                <p class="card-title fw-bold">Grafik Pendaftar</p>
                <small class="fw-light">menampilkan alur grafik pendaftaran perbulannya</small>
              </div>
              <div class="card-body">
                <canvas id="grafikPendaftar" style="height: 20rem;margin-top: 50px;"></canvas>
              </div>
            </div>
          </div> --}}
          <div class="col-12 col-md-12 px-2">
            {{-- catatan aktivitas --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p class="card-title mb-0 fw-bold">Pendaftar Terbaru</p>
                @php
                  $tahunAjaran = App\Models\Generasi::where('status','on')->orderBy('id','DESC')->first();
                  $generasi = (int) $tahunAjaran->generasi;
                @endphp
                <small class="fw-light">
                  Aktivitas pendaftaran terbaru Tahun Ajaran {{ $generasi }} / {{ $generasi+1 }}
                </small>
              </div>
              <div class="card-body ps-2">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>No. HP</th>
                      <th>Dibuat</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users->take(5) as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        {{ $item->name }}
                      </td>
                      <td>
                        {{ $item->nomor }}
                      </td>
                      <td>
                        <span class="fw-bold">{{ $item->created_at->format('H:i:s') }}</span>
                        <span class="fw-light">{{ $item->created_at->format('d/m/y') }}</span>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="4" class="text-center">Tidak ada data terkait</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
        {{-- statistik diagram --}}
        <div class="row">
          <div class="col-6 col-md-4 px-2">
            {{-- statistik rata2 umur pendaftar --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Usia Pendaftar</p>
              </div>
              <div class="card-body d-block">
                <div class="card-stats rounded-4 card-primary mb-1">
                  <div class="card-header mb-0 pb-0 text-center">
                    Rata-Rata Usia
                  </div>
                  <div class="card-body mt-0 pt-0 text-center fs-4 fw-bold">
                    {{ $rataRataUmur }} Tahun
                  </div>
                </div>
                <div class="d-flex justify-content-center align-items-center gap-2">
                  <div class="card-stats rounded-4 w-50">
                    <div class="card-header mb-0 pb-0 text-center">
                      Paling Tua
                    </div>
                    <div class="card-body mt-0 pt-0 text-center fs-4 fw-bold">
                      {{ date_diff(date_create($oldest->tanggal_lahir), date_create('now'))->y }} Tahun
                    </div>
                  </div>
                  <div class="card-stats rounded-4 w-50">
                    <div class="card-header mb-0 pb-0 text-center">
                      Paling Muda
                    </div>
                    <div class="card-body mt-0 pt-0 text-center fs-4 fw-bold">
                      {{ date_diff(date_create($youngest->tanggal_lahir), date_create('now'))->y }} Tahun
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 px-2">
            {{-- statistik rata2 gender --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Gender Pendaftar</p>
              </div>
              <div class="card-body d-flex justify-content-center align-items-center gap-2">
                <div class="card-stats rounded-4 card-primary w-50">
                  <div class="card-header mb-0 pb-0 text-center">
                    Laki-laki
                  </div>
                  <div class="card-body mt-0 pt-0 text-center fs-4 fw-bold">
                    {{ $pria }} Orang
                  </div>
                </div>
                <div class="card-stats rounded-4 w-50">
                  <div class="card-header mb-0 pb-0 text-center">
                    Perempuan
                  </div>
                  <div class="card-body mt-0 pt-0 text-center fs-4 fw-bold">
                    {{ $wanita }} Orang
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 px-2">
            {{-- statistik rata2 pendidikan terakhir --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Pendidikan Terakhir Pendaftar</p>
              </div>
              <div class="card-body d-block">
                <div class="card-stats rounded-4 card-primary mb-1">
                  <div class="card-header mb-0 pb-0 text-center">
                    SMP (Sekolah Menengah Pertama)
                  </div>
                  <div class="card-body mt-0 pt-0 text-center fs-4 fw-bold">
                    {{ $jumlahSMP }} Orang
                  </div>
                </div>
                <div class="d-flex justify-content-center align-items-center gap-2">
                  <div class="card-stats rounded-4 w-50">
                    <div class="card-header mb-0 pb-0 text-center">
                      TK (Taman Kanak)
                    </div>
                    <div class="card-body mt-0 pt-0 text-center fs-4 fw-bold">
                      {{ $jumlahTK }} Orang
                    </div>
                  </div>
                  <div class="card-stats rounded-4 w-50">
                    <div class="card-header mb-0 pb-0 text-center">
                      SD (Sekolah Dasar)
                    </div>
                    <div class="card-body mt-0 pt-0 text-center fs-4 fw-bold">
                      {{ $jumlahSD }} Orang
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- tabel --}}
        <div class="row">
          <div class="col-12 col-md-6 px-2">
            {{-- daftar peserta selesai daftar --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Data Lengkap</p>
                <small class="fw-light">proses pendaftaran telah diselesaikan, menunggu proses wawancara</small>
              </div>
              <div class="card-body">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>No. HP</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users->where('status', 'Wawancara')->take(5) as $item)  
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        {{ $item->name }}
                      </td>
                      <td>
                        {{ $item->nomor }}
                      </td>
                      <td>
                        <a href="{{ route('admin.peserta.show', $item->id) }}" class="badge badge-primary rounded-full">Show</a>
                        <a href="{{ route('admin.wawancara.create', $item->id) }}" class="badge text-primary border border-primary rounded-full">Start</a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="4" class="text-center">Tidak ada data terkait</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 px-2">
            {{-- daftar peserta belum selesai --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Data Belum Lengkap</p>
                <small class="fw-light">proses pendaftaran belum terselesaikan</small>
              </div>
              <div class="card-body">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>No. HP</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users->where('status', 'Belum')->take(5) as $item)  
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        {{ $item->name }}
                      </td>
                      <td>
                        {{ $item->nomor }}
                      </td>
                      <td>
                        <a href="{{ route('admin.peserta.show', $item->id) }}" class="badge badge-primary rounded-full">Show</a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="4" class="text-center">Tidak ada data terkait</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 px-2">
            {{-- daftar yang udah bayar --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Pembayaran Terbaru</p>
                <small class="fw-light">aktivitas proses pembayaran terbaru</small>
              </div>
              <div class="card-body">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>No. Invoice</th>
                      <th>Status Bayar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($payment->take(5) as $item)  
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        {{ $item->user->name }}
                      </td>
                      <td class="text-truncate" style="max-width: 200px;">
                        {{ $item->no_invoice }}
                      </td>
                      <td>
                        <span class="badge @if($item->status == 'berhasil') badge-success @elseif($item->status == 'pending') badge-warning @else badge-danger @endif rounded-full">{{ $item->status }}</span>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="4" class="text-center">Tidak ada data terkait</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 px-2">
            {{-- daftar peserta yang belum / udah diverifikasi dokumen --}}
            <div class="card rounded-4">
              <div class="card-header">
                <p style="font-size: 17px;" class="mb-0 fw-bold">Dokumen Terbaru</p>
                <small class="fw-light">aktivitas upload dokumen terbaru</small>
              </div>
              <div class="card-body">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Status Verifikasi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users->take(5) as $item)
                      @if ($item->document)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>
                            {{ $item->name }}
                          </td>
                          <td>
                            @if ($item->status == 'Belum')
                              <button class="badge badge-info border-0">Belum Terverifikasi</button>
                            @else
                              <button class="badge badge-success border-0">Terverifikasi</button>
                            @endif
                          </td>
                          <td>
                            @if ($item->status == 'Belum')
                              <a href="{{ route('admin.peserta.document', $item->id) }}" class="badge badge-warning rounded-full">Verify</a>
                            @else
                              <a href="{{ route('admin.peserta.show', $item->id) }}" class="badge badge-primary rounded-full">Show</a>
                            @endif
                          </td>
                        </tr>
                      @endif
                    @empty
                    <tr>
                      <td colspan="4" class="text-center">Tidak ada data terkait</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @php
  @endphp
@endsection

@push('add-script')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>

</script>
@endpush