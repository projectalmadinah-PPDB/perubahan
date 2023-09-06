<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\General;
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
    
    public function general()
    {
        $generals = General::first();
        return view('pages.admin.dashboard.setting.general', compact('generals'));
    }

    public function update_general(Request $request)
    {
        $generals = General::first();

        $data = $request->validate([
            'school_name' => 'required|string',
            'school_logo' => 'max:8192',
            'school_email' => 'required|email|max:255',
            'school_phone' => 'string|max:16',
            'school_address' => 'required',
            'desc' => 'required'
        ]);

        if ($request->school_logo) {
            $logo = $request->file('school_logo')->store('logo', 'public');
            $data['school_logo'] = $logo;
        } else {
            $data['school_logo'] = $generals->school_logo;
        }

        // dd($data);

        $generals->update($data);
        return redirect()->route('admin.settings.general', compact('generals'))->with('tersimpan', true);
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
