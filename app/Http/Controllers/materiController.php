<?php

namespace App\Http\Controllers;

use App\Http\Requests\materiRequest;
use App\Http\Requests\materiUpdateRequest;
use App\Models\Category;
use App\Models\Materi;
use App\Models\MateriFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class materiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = Materi::when(!is_null(Auth::user()->category_id), function($q) {
            $q->where('category_id', Auth::user()->category_id);
        })->get();
        return view('index_materi', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $created = true;
        $category = Category::get();
        return view('add_materi', compact('created', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(materiRequest $request)
    {
        $data = $request->only('title','category_id');
        $data['materi_id'] = (string) Str::uuid();
        $materi = Materi::create($data);
        if (!is_null($materi)) {
            $path = $request->path;
            for ($i=0;$i < count($path);$i++) {
                $filename = rand().time(). '.' . $path[$i]->getClientOriginalExtension();
                $path[$i]->move(public_path().'/upload/pdf/', $filename);
                $materiFile['path'] = $filename;
                $materiFile['materi_file_id'] = (string) Str::uuid();
                $materiFile['materi_id'] = $materi->materi_id;
                MateriFile::create($materiFile);
            }

            session()->flash('success', 'Sukses membuat materi');
            return response()->json(['success' => true]);
        }
        return view('add_materi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $materi = Materi::where('materi_id', $uuid)->first();
        if (is_null($materi)) {
            session()->flash('error', 'Data Materi tidak ditemukan');
            return redirect(URL('/materi'));
        }

        $category = Category::get();
        return view('detail_materi', compact('materi', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $materi = Materi::where('materi_id', $uuid)->first();
        if (is_null($materi)) {
            session()->flash('error', 'Data Materi tidak ditemukan');
            return redirect(URL('/materi'));
        }

        $category = Category::get();
        $created = false;
        return view('add_materi', compact('created', 'materi', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(materiUpdateRequest $request, $uuid)
    {
        $materi = Materi::where('materi_id', $uuid)->first();
        if (!is_null($materi)) {
            $materi->update([
                'title' => $request->title,
                'category_id' => $request->category_id
            ]);

            $path = $request->path;
            if ($path) {
                for ($i=0;$i < count($path);$i++) {
                    $filename = rand().time(). '.' . $path[$i]->getClientOriginalExtension();
                    $path[$i]->move(public_path().'/upload/pdf/', $filename);
                    $materiFile['path'] = $filename;
                    $materiFile['materi_file_id'] = (string) Str::uuid();
                    $materiFile['materi_id'] = $materi->materi_id;
                    MateriFile::create($materiFile);
                }
            }

            session()->flash('success', 'Sukses merubah materi');
            return response()->json(['success' => true]);
        }
        return response()->json(['status' => false, 'message' => 'data materi tidak ditemukan']);
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

    public function deleteMateri($uuid)
    {
        $materi = MateriFile::where('materi_file_id', $uuid)->first();
        if (!is_null($materi)) {
            $materi->delete();
            session()->flash('success', 'Sukses menghapus file');
            return redirect(URL('/materi/'.$materi->materi_id.'/edit'));
        }
        session()->flash('error', 'file tidak ditemukan');
        return redirect(URL('/materi'));
    }
}
