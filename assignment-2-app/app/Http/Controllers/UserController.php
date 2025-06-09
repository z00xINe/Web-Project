<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller

{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'user' => 'required|string|max:50|unique:users,user_name',
            'pnum' => 'required|string|max:13',
            'wnum' => 'required|string|max:13',
            'address' => 'required|string|max:50',
            'pass' => 'required|string|min:6',
            'email' => 'required|email|max:50',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $image = $request->file('image');
        $originalName = $image->getClientOriginalName();
        $uniqueName = uniqid('img_', true) . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/uploads', $uniqueName);

        User::create([
            'full_name' => $request->name,
            'user_name' => $request->user,
            'phone_number' => $request->pnum,
            'whatsapp_number' => $request->wnum,
            'addres' => $request->address,
            'pasword' => $request->pass,
            'email' => $request->email,
            'user_image' => $uniqueName,
            'original_file_name' => $originalName,
        ]);

        return redirect()->back()->with('success', 'User registered successfully!');
    }
}
