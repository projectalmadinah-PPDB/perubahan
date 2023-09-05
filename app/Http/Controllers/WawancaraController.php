<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wawancara;
use Illuminate\Http\Request;

class WawancaraController extends Controller
{
    public function index()
    {
        $data = User::where('role','user')->with('wawancara')->paginate(5);
        // $wawancara = Wawancara::find();
        return view('pages.admin.dashboard.wawancara.index',compact('data'));
    }

    public function store(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        $data = $request->validate([
            'tanggal' => 'required',
            'link' =>'required'
        ]);
        $data['user_id'] = $user->id;
        Wawancara::create($data);

        return redirect()->route('admin.wawancara.index');
    }

    public function update(Request $request,$id)
    {
        $wawancara = Wawancara::find($id);
        $data = $request->validate([
            'tanggal' => 'required',
            'link' =>'required'
        ]);
        $wawancara->save($data);

        return redirect()->route('admin.wawancara.index');
    }
}
