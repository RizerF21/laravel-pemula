<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        $category = Category::all();
        return view('post.index', compact('post', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('post.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required'
        ]);

        $file = $request->file('image');
        // $fileName = time() . '.' . $file->extension();
        // $file = storage::putFileAs('foto', $file, $fileName);
        $file->storeAs('public/post', $file->hashName());

        Post::create([
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'body' => $request->body,
            'image' => $file->hashName(),
            'category_id' => $request->category_id
        ]);

        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $category = Category::all();

        return view('post.edit', compact('post', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validation = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'

        ]);

        $post = Post::find($id);

        if ($request->file('image')) {
            $file = $request->file('image');
            $file->storeAs('public/post', $file->hashName());
            $post->update([
                'title' => $request->title,
                'slug' => \Str::slug($request->title),
                'body' => $request->body,
                'image' => $file->hashName(),
                'category_id' => $request->category_id
            ]);
        } else {
            $post->update([
                'title' => $request->title,
                'slug' => \Str::slug($request->title),
                'body' => $request->body,
                'category_id' => $request->category_id
            ]);
        }

        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        Storage::delete('public/post/' . $post->image);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }
}
