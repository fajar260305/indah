<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PenggunaRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::latest()->get();
        return view('admin.pengguna.pengguna', [
            'users' => $user
        ]);
    }

    public function tambah()
    {
        return view('admin.pengguna.tambahPengguna');
    }

    public function store(PenggunaRequest $request)
    {
        // dd($request->all());
        $request['password'] = Hash::make($request->password);
        User::create($request->all());

        return redirect('/pengguna');
    }

    public function edit(User $user)
    {
        return view('admin.pengguna.editPengguna', [
            'user' => $user
        ]);
    }

    public function update(PenggunaRequest $request, User $user)
    {
        User::where('id', $user->id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role 
        ]);

        return redirect('/pengguna');
    }

    public function delete(User $user)
    {
        User::destroy($user->id);

        return redirect('/pengguna')->with('deleted', 'Admin has been deleted!');
    }
}
