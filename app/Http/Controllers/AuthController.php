<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return view('index');
        } else {
            return view('login');
        }
    }

    public function register() {
        if (Auth::check()) {
            return view('index');
        } else {
            $category = Category::get();
            return view('register', compact('category'));
        }
    }

    public function doRegister(registerRequest $request) {
        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            $user->assignRole('member');
            session()->flash('success', 'Sukses membuat member');
            return response()->json(['success' => true]);
        }
        return view('register');
    }

    public function doLogin(Request $request) 
    {
        $user = User::where('email', $request->email)->first();
        if (is_null($user)) {
            return response()->json(['status' => false, 'message' => 'akun tidak ditemukan']);
        }

        if (Hash::check($request->password, $user->password)) {
            $idUser = $user->id;
            $user->update(['token' => md5(rand(1, 10) . microtime()), 'last_login' => Date('Y-m-d H:i:s')]);
            Auth::loginUsingId($idUser, true);
            Session::put('user.token', $user->token);

            return response()->json(['status' => true, 'message' => "Login Berhasil !"]);
        }
        return response()->json(['status' => false, 'message' => "Password yang dimasukan salah"]);
    }

    public function doLogout(Request $request)
    {
        Auth::logout();
        session()->flash('success', 'Sukses logout');
        return redirect('/');
    }
}
