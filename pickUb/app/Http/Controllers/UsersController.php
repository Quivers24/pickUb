<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'max:255',
            'noHp' => 'max:15',
            'email' => 'email|max:255',
        ]);


        $user = User::findOrFail(auth()->user()->id);
        $user->name = $validatedData['name'];
        $user->noHp = $validatedData['noHp'];
        $user->email = $validatedData['email'];
        if($request->facebook == null)
        {
            $user->status_facebook = 'off';
        }else{
            $user->status_facebook = 'on';
        }
        if($request->google == null)
        {
            $user->status_google = 'off';
        }else{
            $user->status_google = 'on';
        }
        $user->save();


        return redirect()->back()->with('success', 'Profile berhasil disimpan');
    }
    public function updateAkun(Request $request)
    {

        $validatedData = $request->validate([
            'facebook' => 'max:255',
            'google' => 'max:255',
        ]);


        $user = User::findOrFail(auth()->user()->id);
        $user->facebook = $validatedData['facebook'];
        $user->google = $validatedData['google'];
        $user->save();


        return redirect()->back()->with('success', 'Akun berhasil disimpan');
    }


    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('img/profile'), $imageName);
        $user = User::findOrFail(auth()->user()->id);
        $user->image = $imageName;
        $user->save();



        return redirect()->back()->with('success', 'Foto berhasil di upload.');
    }
}
