<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function show($id)
    {
        $result = User::find($id);
        return view('users.edit',compact('result'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->day_of_birth = $request->input('day_of_birth');
        $user->phone_number = $request->input('phone_number');

        $user->save();

        return redirect()->route('users.index')->withSuccess('User info updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();

        return redirect()->route('users.index')->withSuccess('User deleted successfully.');
    }
}
