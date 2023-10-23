<?php

namespace App\Http\Controllers;

use App\Http\Requests\kategoriRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::get();
        return view('index_category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $created = true;
        return view('add_kategori', compact('created'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(kategoriRequest $request)
    {
        $data = $request->only('name');
        $data['category_id'] = (string) Str::uuid();
        $category = Category::create($data);
        if (!is_null($category)) {
            session()->flash('success', 'Sukses membuat kategori');
            return response()->json(['success' => true]);
        }
        return view('add_kategori');
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
    public function edit($uuid)
    {
        $category = Category::where('category_id', $uuid)->first();
        if (is_null($category)) {
            session()->flash('error', 'Data Kategori tidak ditemukan');
            return redirect(URL('/kategori'));
        }

        $created = false;
        return view('add_kategori', compact('created', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(kategoriRequest $request, $uuid)
    {
        $category = Category::where('category_id', $uuid)->first();
        if (!is_null($category)) {
            $category->update([
                'name' => $request->name
            ]);
            session()->flash('success', 'Sukses merubah kategori');
            return response()->json(['success' => true]);
        }
        return response()->json(['status' => false, 'message' => 'data kategori tidak ditemukan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $kategori = Category::where('category_id', $uuid)->first();
        if (!is_null($kategori)) {
            $kategori->delete();
            session()->flash('success', 'Sukses menghapus kategori');
            return redirect(URL('/kategori'));
        }
        session()->flash('error', 'kategori tidak ditemukan');
        return redirect(URL('/kategori'));
    }
}
