<?php

namespace App\Livewire;

use App\Models\Payment;
use App\Models\User;
use Livewire\Component;

class PembayaranTable extends Component
{
    public $mySelected = [];
    public $selectAll = false;
    public $firstId = NULL;

    public function render()
    {
        $users = User::where('role','user')->get();
        $this->firstId = $users[0]->id;
        return view('livewire.pembayaran-table',compact('users'));
    }

    public function updatemySelected($value){
        if(count($value) == 10){
            $this->selectAll = true;
        }else{
            $this->selectAll = false;
        }
    }

    public function deletes($id)
{
    $user = User::where('id',$id)->find($id);
    $user->delete();

    session()->flash('delete', 'berhasil');
}

}
