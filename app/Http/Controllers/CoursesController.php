<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // method untuk menampilkan data courses
    public function index()
    {
        // tarik data courses dari db
        $courses = Courses::all();

        // panggil view dan kirim data courses
        return view('admin.contents.courses.index', [
            'courses' => $courses,
        ]);
    }

    // method untuk menampilkan form tambah courses
    public function create()
    {
        // panggil view
        return view('admin.contents.courses.create');
    }

    // method untuk menyimpan data courses baru
    public function store(Request $request)
    {
        // validasi data yang diterima
        $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // simpan data ke db
        Courses::create([
            'id' => $request->id,
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembalikan ke halaman courses
        return redirect('/admin/courses')->with('message', 'Berhasil Menambahkan Courses');
    }

    // method untuk menampilkan halaman edit
    public function edit($id)
    {
        // cari data courses berdasarkan id
        $courses = Courses::find($id);

        return view('admin.contents.courses.edit', [
            'courses' => $courses
        ]);
    }

    // method untuk menyimpan hasil update 
    public function update($id, Request $request)
    {
        // cari data courses berdasarkan id
        $courses = Courses::find($id);

        // validasi data yang diterima
        $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // simpan perubahan
        $courses->update([
            'id' => $request->id,
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembalikan ke halaman courses
        return redirect('/admin/courses')->with('message', 'Berhasil Mengedit Courses');
    }

    // method untuk menghapus courses
    public function destroy($id)
    {
        // cari data courses berdasarkan id
        $courses = Courses::find($id);

        // hapus courses
        $courses->delete();

        // kembalikan ke halaman courses
        return redirect('/admin/courses')->with('message', 'Berhasil Menghapus Courses');
    }
}