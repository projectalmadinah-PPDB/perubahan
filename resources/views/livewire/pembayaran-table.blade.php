<div>
  @dump($firstId)
  @dump($selectAll)
  @dump($mySelected)

    <table class="table table-bordered data" id="table">
        <thead>
            <tr>
                <th>
                  <input type="checkbox" wire:model="selectAll">
                  <input type="hidden" wire:model="firstId" value="{{$users[0]->id }}">
                </th>
                <th>ID</th>
                <th>Name</th>
                <th>Nomor Hp</th>
                <th>Status</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $item)
                <tr>
                    <td><input type="checkbox" wire:model="mySelected" value="{{$item->id}}"></td>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->nomor}}</td>
                    {{-- <td>
                      @if ($item->payment->status == 'pending')
                        <button type="button" class="badge badge-warning border-0">{{$item->payment->status}}</button>
                      @elseif($item->payment->status == 'berhasil')
                        <button type="button" class="badge badge-success border-0">{{$item->payment->status}}</button>
                      @elseif($item->payment->status == 'expired')
                        <button type="button" class="badge badge-danger border-0">{{$item->payment->status}}</button>
                      @endif
                    </td> --}}
                    <td>
                        <button wire:click="deletes({{$item->id}})" class="btn btn-danger border-0">Delete</button>
                     </td>
                    </tr>
             @endforeach
        </tbody>
    </table>
</div>
