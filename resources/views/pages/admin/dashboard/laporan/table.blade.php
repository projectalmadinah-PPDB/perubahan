<div class="table-responsive">
    <style>
      @font-face {
        font-family: 'Poppins';
        src: url(dists/assets/font);
      }
      * {
        font-family: 'Poppins';
      }
    </style>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Nomor Hp</th>
          <th>Jenis Kelamin</th>
          <th>Tanggal Lahir</th>
          <th>NIK</th>
          <th>NISN</th>
          <th>Tempat Lahir</th>
          <th>Hobby</th>
          <th>Asal Sekolah</th>
          <th>Cita - Cita</th>
          <th>Pendidikan Terakhir</th>
          <th>Organisasi</th>
          <th>Alamat</th>
          <th>Nama Ayah</th>
          <th>Nomor Ayah</th>
          <th>Pekerjaan Ayah</th>
          <th>Nama Ibu</th>
          <th>Nomor Ibu</th>
          <th>Pekerjaan Ibu</th>
          <th>Penghasilan Ortu</th>
          <th>Anak Ke</th>
          <th>Dari Berapa Soudara</th>
          <th>Status Pembayaran</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $index => $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->nomor}}</td>
            <td>{{$item->jenis_kelamin}}</td>
            <td>{{$item->tanggal_lahir}}</td>
              
              <td>{{ optional($item->student)->nik ?: '-' }}</td>
              <td>{{ optional($item->student)->nisn ?: '-' }}</td>
              <td>{{ optional($item->student)->birthplace ?: '-' }}</td>
              <td>{{ optional($item->student)->hobby ?: '-' }}</td>
              <td>{{ optional($item->student)->old_school ?: '-' }}</td>
              <td>{{ optional($item->student)->ambition ?: '-' }}</td>
              <td>{{ optional($item->student)->last_graduate ?: '-' }}</td>
              <td>{{ optional($item->student)->organization_exp ?: '-' }}</td>
              <td>{{ optional($item->student)->address ?: '-' }}</td>
              <td>{{ optional($item->parents)->father_name ?: '-' }}</td>
              <td>{{ optional($item->parents)->father_phone ?: '-' }}</td>
              <td>{{ optional($item->parents)->father_job ?: '-' }}</td>
              <td>{{ optional($item->parents)->mother_name ?: '-' }}</td>
              <td>{{ optional($item->parents)->mother_phone ?: '-' }}</td>
              <td>{{ optional($item->parents)->mother_job ?: '-' }}</td>
              <td>
                @if (optional($item->parents)->parent_earning === 'A')
                  Kurang dari 1.000.000
                @elseif (optional($item->parents)->parent_earning === 'B')
                  1.000.000 - 5.000.000
                @elseif (optional($item->parents)->parent_earning === 'C')
                  5.000.000 - 10.000.000
                @elseif (empty(optional($item->parents)->parent_earning))
                  -
                @else
                  Lebih dari 10.000.000
                @endif
              </td>              
              <td>{{optional($item->parents)->child_no ?: '-' }}</td>
              <td>{{optional($item->parents)->no_of_sibling ?: '-' }}</td>
            
            <td>
              @if (!$item->payment)
              <button class="badge badge-primary border-0">Belum Membayar</button>
              @else
                @if ($item->payment->status == 'berhasil')
                  <button class="badge badge-success border-0">{{$item->payment->status}}</button>
                @elseif($item->payment->status == 'expired')
                <button class="badge badge-danger border-0">{{$item->payment->status}}</button>
                @else
                <button class="badge badge-warning border-0">{{$item->payment->status}}</button>
                @endif
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>