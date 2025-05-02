<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
   public function edit()
    {
        $user = Auth::user();
        return view('profile.useredit', compact('user'));
    }

    public function update(Request $request)
    {
          $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('img')) {
            if ($user->img) {
                Storage::disk('public')->delete($user->img);
            }
            $data['img'] = $request->file('img')->store('users', 'public');
        }

        $user->update($data);
        

      return redirect()->route('profile.edit', ['user' => $user]);
    }

}
