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
    <form action="" name="form1" id="form1" method="POST">
      @csrf
    <table class="table table-bordered">
      <thead>
        <tr>
          <th><input type="checkbox" name="select_all" class="select_all" id="select_all"></th>
          <th>ID</th>
          <th>Name</th>
          <th>Nomor Hp</th>
          <th>Biodata</th>
          <th>Status Pembayaran</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $index => $item)
          <tr>
            <td><input type="checkbox" name="id[{{$item->id}}]" class="checkbox1" value="{{$item->id}}"></td>
            <td>{{$index + 1}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->nomor}}</td>
            {{-- <td>{{$item->tanggal_lahir}}</td>
            <td>{{$item->jenis_kelamin}}</td> --}}
            {{-- <td>{{$item->nik}}</td> --}}
            @if($item->student && $item->document)
            <td><button class="badge badge-success border-0">Lengkap</button></td>
            @else
            <td><button class="badge badge-danger border-0">Tidak Legkap</button></td>
            @endif
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