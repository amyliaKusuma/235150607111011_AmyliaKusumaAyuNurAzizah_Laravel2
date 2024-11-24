<?php

namespace App\Http\Controllers;

use App\Models\Blog; // Import model Blog
use App\Models\User; // Import model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // Menampilkan daftar blog
    public function showBlogs()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('blogs.list', compact('blogs')); // Pastikan view tersedia
    }

    // Form untuk membuat blog baru
    public function create()
    {
        return view('blogs.create'); // Pastikan view tersedia
    }

    // Menyimpan blog baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string|max:255',
            'pembuat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('blog_images', 'public');
        }
    
        Blog::create($validatedData);
        return redirect()->route('blogs.list')->with('success', 'Blog berhasil dibuat!');
    }    

    // Form untuk mengedit blog
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog')); // Pastikan view tersedia
    }

    // Mengupdate blog
    public function update(Request $request, $id) 
    {
    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required|string|max:255',
        'pembuat' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $blog = Blog::findOrFail($id);

    if ($request->hasFile('foto')) {
        if ($blog->foto) {
            Storage::disk('public')->delete($blog->foto);
        }
        $validatedData['foto'] = $request->file('foto')->store('blog_images', 'public');
    }
    

    $blog->update($validatedData);

    return redirect()->route('blogs.list')->with('success', 'Blog berhasil diperbarui!');
}

    // Menghapus blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Hapus foto jika ada
        if ($blog->foto) {
            Storage::disk('public')->delete($blog->foto);
        }

        $blog->delete();

        return redirect()->route('blogs.list')->with('success', 'Blog berhasil dihapus!');
    }

    // Menampilkan halaman index
    public function index()
    {
        return view('index'); // Pastikan view tersedia
    }
}
