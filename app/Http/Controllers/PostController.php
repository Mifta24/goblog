<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index()
    {

        return view('blog', ['title' => 'Blog Page', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(3)->withQueryString()]);
    }

    public function show(Post $post)
    {
        return view('detail-blog', ['posts' => $post]);
    }

    public function create()
    {
        $category = Category::without('posts')->get();
        return view('new-blog', ['title' => 'New Blog', 'categories' => $category]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        $data = $request->all();
        $data['author_id'] = '3';
        $data['slug'] = Str::slug($request->title);

        Post::create($data);

        return redirect('/blog')->with('success', 'New Article has been successfully created');
    }

    public function edit(Post $post)
    {
        $post->loadMissing('author');
        $categories = Category::all(); // Mengambil semua kategori
        return view('update-blog', [
            'title' => 'Edit Blog',
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Post $post)
    {
        // Validasi data
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        // Cek aksi yang diambil
        if ($request->input('action') == 'update') {
            // Update post
            $post->update([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'category_id' => $request->input('category_id'),
                'slug' => Str::slug($request->input('title'))
            ]);

            return redirect('/blog')->with('success', 'Post has been successfully updated.');
        } elseif ($request->input('action') == 'delete') {

            return redirect ('delete-blog/'.$post->slug);
        } else {
            return redirect('/blog')->with('error', 'Invalid action.');
        }
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/blog')->with('success', 'Article has been deleted.');
    }
}
