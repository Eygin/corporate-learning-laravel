<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Http\Requests\registerUpdateRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = User::whereNotNull('category_id')->get();
        return view('index_member', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        $created = true;
        return view('add_member', compact('category', 'created'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(registerRequest $request)
    {
         // Create a new user
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'category_id' => $request->category_id
        ]);

        if ($user) {
            $user->assignRole('member');
            session()->flash('success', 'Sukses membuat member');
            return response()->json(['success' => true]);
        }
        return view('add_member');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        if (is_null($user)) {
            session()->flash('error', 'Data Member tidak ditemukan');
            return redirect(URL('/member'));
        }
        $category = Category::get();
        $created = false;
        return view('add_member', compact('category', 'created', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(registerUpdateRequest $request, $id)
    {
        $user = User::where('id', $id)->first();
        if (!is_null($user)) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'category_id' => $request->category_id
            ]);
            session()->flash('success', 'Sukses merubah member');
            return response()->json(['success' => true]);
        }
        return response()->json(['status' => false, 'message' => 'data user tidak ditemukan']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        if (!is_null($user)) {
            $user->delete();
            session()->flash('success', 'Sukses menghapus member');
            return redirect(URL('/member'));
        }
        session()->flash('error', 'member tidak ditemukan');
        return redirect(URL('/member'));
    }
}
