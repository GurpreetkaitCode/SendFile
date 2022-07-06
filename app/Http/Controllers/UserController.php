<?php

namespace App\Http\Controllers;

use App\Mail\SendFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show()
    {
        $users = User::all()->where('id', '!=', 1);
        return view('dashboard', compact('users'));
    }

    public function storeuser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gstnumber = $request->gstnumber;
        $user->password = Hash::make($request->password);
        $file = $request->file('file');
        $filepath = $file->store('uploads');
        Mail::to($request->email)->send(new SendFile($file));
        $user->file = $filepath;
        $user->save();

        return redirect()->route('dashboard');
    }
}
