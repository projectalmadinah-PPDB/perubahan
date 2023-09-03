<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public $user;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('front.edit-profile',compact('user'));
    }

    public function profile()
    {
        $profile = Auth::user();
        return view('pages.admin.dashboard.setting.profile',compact('profile'));
    }

    public function update_profile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $profile = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email,'.$user->id
        ]);

        $user->update($profile);

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        if(!Hash::check($request->old_password,$user->password)){
            return redirect()->back();
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.profile.index')->with('success','Berhasil Mengupdate Profile');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.admin.change');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $validate = $request->validate([
            'name' => 'required|max:255|string',
            'nomor' => 'required|unique:users,nomor,' .  $user->id,
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required'
        ]);
        $user->update($validate);
        $messages = "Kenapa Kamu Mengganti Profile ?";

        $this->send_message($user->nomor,$messages);
        return redirect()->route('user.profile')->with('success','Kamu Telah Mengganti Profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function change_password()
    {
        return view('front.change');
    }

    public function change_password_process(Request $request)
    {
        $user = User::find(Auth::user()->id);
        

        return redirect()->route('admin.setting.index');
    }
}
