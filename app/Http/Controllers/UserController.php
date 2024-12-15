<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::paginate(10);
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request = $request->validate([
            'name' => 'required',
            'noreg' => 'required | unique:users',
            'password' => 'required|min:5',
            'department' => 'required',
            'class' => 'required',
        ]);

        User::create([
            'name' => $request['name'],
            'noreg' => $request['noreg'],
            'password' => bcrypt($request['password']),
            'department' => $request['department'],
            'class' => $request['class'],
        ]);
        // kembali ke halaman index, dan tampilkan pesan sukses selama 3 detik
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail((int) $id);
        return view('user.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail((int) $id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id = (int) $id; // Cast to integer
        $request = $request->validate([
            'name' => 'required',
            'noreg' => 'required | unique:users,noreg,' . $id,
            'department' => 'required',
            'class' => 'required',
        ]);

        User::findOrFail($id)->update([
            'name' => $request['name'],
            'noreg' => $request['noreg'],
            'department' => $request['department'],
            'class' => $request['class'],
        ]);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail((int) $id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus');
    }
}
