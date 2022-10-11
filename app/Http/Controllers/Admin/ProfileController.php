<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }


    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user->adresse = $request->input('adresse');
        $user->phone = $request->input('phone');

        if ($request->hasFile('image'))
        {
            $destination = 'uploads/profile/' .$user->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;

            $file->move('uploads/profile/', $filename);
            $user->image = $filename;
        }

            $user->update();
            return redirect()->back()->with('success', 'Votre profile a été modifié avec succès !');
    }
}
