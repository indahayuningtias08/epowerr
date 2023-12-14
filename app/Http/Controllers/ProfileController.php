<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
{
    $user = User::findOrFail(Auth::id());

    return view('profile', compact('user'));
}

public function update(Request $request, $id)
{
    request()->validate([
        'username'       => 'required|string|min:2|max:100',
        'old_password' => 'nullable|string',
        'password' => 'nullable|required_with:old_password|string|confirmed|min:6'
    ]);

    $user = User::find($id);

    $user->username = $request->username;
    
    if ($request->filled('old_password')) {
        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        } else {
            return back()
                ->withErrors(['old_password' => __('Please enter the correct password')])
                ->withInput();
        }
    }

    if (request()->hasFile('photo')) {
        if($user->photo && file_exists(storage_path('app/public/photos/' . $user->photo))){
            Storage::delete('app/public/photos/'.$user->photo);
        }

        $file = $request->file('photo');
        $fileName = $file->hashName() . '.' . $file->getClientOriginalExtension();
        $request->photo->move(storage_path('app/public/photos'), $fileName);
        $user->photo = $fileName;
    }


    $user->save();

    return back()->with('status', 'Profile updated!');
}
}
