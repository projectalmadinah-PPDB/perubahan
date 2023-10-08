<div class="table-responsive">
    <form action="" name="form1" id="form1" method="POST">
      @csrf
    <table class="table table-bordered">
      <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Nomor HP</th>
            <th>Status Nikah</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $index => $item)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->nomor}}</td>
                <td><button class="badge badge-success border-0">{{$item->status}}</button></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>