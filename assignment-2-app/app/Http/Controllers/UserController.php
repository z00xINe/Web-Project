<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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

        $user = new User();
        $user->full_name = $request->input('name');
        $user->user_name = $request->input('user');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('pnum');
        $user->whatsapp_number = $request->input('wnum');
        $user->password = Hash::make($request->input('pass'));
        $user->address = $request->input('address');

        if ($request->hasFile('image')) {
            $originalFileName = $request->file('image')->getClientOriginalName();
            $uniqueFileName = uniqid('img_', true) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads'), $uniqueFileName);

            $user->original_file_name = $originalFileName;
            $user->user_image = $uniqueFileName;
        }

        $user->save();

        return "<script>
            alert('User created successfully!');
            window.location.href = '/login';
        </script>";
    }
}
