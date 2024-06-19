<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('user')->get(); // Menggunakan pagination
        if (Auth::user()->role == 'admin') {
            return view('dashboard.blogs.index', compact('blogs'));
        } else {
            return view('pages.blogs.index', compact('blogs'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        if (Auth::user()->role != 'admin') {
            return redirect()->route('blogs.index')->with('error', 'You are not authorized to create a blog');
        }
        $request->validated();
        $image_name = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $request->title . '_' . time() . '.' . $image->extension();
            $image->move(public_path('assets/images/blogs/'), $image_name);
        }
        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image_name,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog = Blog::with('user', 'comments.user')->findOrFail($blog->id);
        if (Auth::user()->role == 'admin') {
            return view('dashboard.blogs.show', compact('blog'));
        } else {
            return view('pages.blogs.show', compact('blog'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('dashboard.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if (Auth::user()->role != 'admin') {
            return redirect()->route('blogs.index')->with('error', 'You are not authorized to update a blog');
        }
        $request->validated();
        $image_name = $blog->image;
        if ($request->hasFile('image')) {
            $oldImagePath = public_path('assets/images/blogs/' . $blog->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $image = $request->file('image');
            $image_name = $request->title . '_' . time() . '.' . $image->extension();
            $image->move(public_path('assets/images/blogs/'), $image_name);
        }

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image_name,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (Auth::user()->role != 'admin') {
            return redirect()->route('blogs.index')->with('error', 'You are not authorized to delete a blog');
        }
        if ($blog->image) {
            $oldImagePath = public_path('assets/images/blogs/' . $blog->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
    }
}
