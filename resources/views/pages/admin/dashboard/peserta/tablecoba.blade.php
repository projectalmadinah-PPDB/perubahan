    <style>
      @font-face {
        font-family: 'Poppins';
        src: url(dists/assets/font);
      }
      * {
        font-family: 'Poppins';
        font-size: 12px;
        text-align: center;
      }
    </style>
<div class="table-responsive">
    <form action="" name="form1" id="form1" method="POST">
      @csrf
    <table class="table table-bordered data">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>NIK</th>
          <th>NISN</th>
          <th>Gender</th>
          <th>Nomor HP</th>
          <th>Alamat</th>
          <th>Asal Sekolah</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Nama Ayah</th>
          <th>Nomor Ayah</th>
          <th>Pekerjaan Ayah</th>
          <th>Nama Ibu</th>
          <th>Nomor Ibu</th>
          <th>Pekerjaan Ibu</th>
          <th>Penghasilan Ortu</th>
          <th>Jumlah Saudara</th>
          <th>Anak Ke-</th>
          <th>Biodata</th>
          <th>Status Pembayaran</th>
          <th>Status Tes</th>
          {{-- <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th> --}}
          {{-- <th>NIK</th> --}}
          {{-- <th>Action</th> --}}
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $index => $item)
        
          <tr>
            <td title="id">{{$loop->iteration}}</td>
            <td title="nama">{{$item->name}}</td>
            <td title="nik">{{$item->student->nik}}</td>
            <td title="nisn">{{$item->student->nisn}}</td>
            <td title="gender">@if($item->jenis_kelamin == 'Laki-Laki') L @else P @endif</td>
            <td title="nomor hp">{{$item->nomor}}</td>
            <td title="alamat">{{$item->student->address}}</td>
            <td title="asal sekolah">{{$item->student->old_school}}</td>
            <td title="tempat lahir">{{$item->student->birthplace}}</td>
            <td title="tanggal lahir">{{$item->tanggal_lahir}}</td>
            <td title="nama ayah">{{$item->father_name}}</td>
            <td title="nomor ayah">{{$item->father_phone}}</td>
            <td title="pekerjaan ayah">{{$item->father_job}}</td>
            <td title="nama ibu">{{$item->mother_name}}</td>
            <td title="nomor ibu">{{$item->mother_phone}}</td>
            <td title="pekerjaan ibu">{{$item->mother_job}}</td>
            <td title="penghasilan ortu">{{$item->parent_earning}}</td>
            <td title="jumlah saudara">{{$item->no_of_sibling}}</td>
            <td title="anak ke-">{{$item->child_no}}</td>
            {{-- <td title="">{{$item->tanggal_lahir}}</td>
            <td title="">{{$item->jenis_kelamin}}</td> --}}
            {{-- <td title="">{{$item->nik}}</td> --}}
            @if($item && $item->document)
            <td title="biodata">
                <a class="badge badge-success border-0 text-white">Lengkap &#x2714;</a>
            </td>
            @elseif ($item && !$item->document)
            <td title="biodata">
              <a class="badge badge-success border-0 text-white">data &#x2714;
              </a>
              <a href="" class="badge badge-danger">Document &#x2715;</a>
            </td>
            @else
            <td title="biodata">
              <button class="badge badge-danger border-0">Tidak Legkap</button></td>
            @endif
            <td title="status pembayaran">
              @if (!$item->payment)
              <a class="badge badge-danger border-0 text-white">Belum Bayar</a>
              @elseif($item->payment->status == 'berhasil')
              <a class="badge badge-success border-0 text-white">Lunas</a>
              @elseif($item->paymnet->status == 'pending')
              <a class="badge badge-warning border-0 text-white">Pending</a>
              @else
              <a class="badge badge-danger border-0 text-white">Expired</a>
              @endif
            </td>
            <td title="status tes">
              @if ($item->status == 'Belum')
                  <a class="badge badge-danger border-0 text-white">Tidak Ada Status</a>
              @elseif($item->status == 'Gagal')
                  <a class="badge badge-danger border-0 text-white">Tidak Lulus</a>
              @elseif($item->status == 'Wawancara')
                  <a class="badge badge-primary border-0 text-white">Wawancara</a>
              @elseif($item->status == 'Lulus')
                  <a class="badge badge-success border-0 text-white">Lulus</a>
              @endif
            </td>
            </form>
            {{-- <td title="">
              @if(!$item)
              <a href="" class="badge badge-danger">Tidak Ada Data</a>
              @else
              <a href="{{route('admin.peserta.show',$item->id)}}" class="badge badge-primary">Data Pribadi</a>
              @endif
              @if ($item->document) 
              <a href="{{route('admin.peserta.document',$item->document->id)}}" class="badge badge-warning">Document</a>
              @endif
              <a href="{{route('admin.peserta.edit',$item->id)}}" class="badge badge-warning">Edit</a>
              <form action="{{route('admin.peserta.destroy',$item->id)}}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="badge badge-danger border-0">Delete</button>
              </form>
              
              <div class="dropdown d-inline">
                <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bi bi-three-dots-vertical"></i>
                </a>
              
                <div class="dropdown-menu" aria-labelledby="customDropdown">
                  <form action="{{route('admin.pengecekan',$item->id)}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="d-flex flex-wrap">
                      <button type="submit" name="status" value="Lulus" class="border-0 bg-success w-100 text-bold text-white" >Lolos Semua</button>
                      <button name="status" type="submit" class="border-0 bg-danger w-100 text-bold text-white" value="Wawancara">Lanjut Wawancara</button>
                      <button type="submit" name="status" value="Gagal" class="border-0 bg-warning w-100 text-bold text-white" >Gagal / Gugur</button>
                    </div>
                  </form>
                </div>
              </div>
            </td> --}}
          </tr>
        @endforeach
      </tbody>
    </table>
    </form>
  </div>