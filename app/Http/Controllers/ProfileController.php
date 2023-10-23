<?php

namespace App\Http\Controllers;

use App\Http\Requests\changePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword(changePasswordRequest $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if (!is_null($user)) {
            $data = $user->update(['password' => Hash::make($request->password)]);
            session()->flash('success', 'Password berhasil dirubah');
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false, 'message' => 'Password gagal dirubah']);
    }
}
