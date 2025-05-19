<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::withTotalVisitCount()->latest()->get();
        return view('backend.blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::latest()->get();
        return view('backend.blog.create-and-edit', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'status' => $request->has('status') ? true : false,
        ]);
        $validatedData = $request->validate([
            'category_id' => 'required',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:300',
            'body' => 'required|string',
            'thumbnail' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Max size: 1MB
            'status' => 'nullable|boolean',
        ]);

        // Generate slug from title
        $slug = Str::slug($request->title);
        $uniqueString = Str::random(6);
        $validatedData['slug'] = $slug . '-' . $uniqueString;
        if ($request->hasFile('thumbnail')) {
            $filePath = $request->file('thumbnail')->store('uploads/blogs', 'public');
            $validatedData['thumbnail'] = $filePath;
        }





        // Save blog
        $blog = Blog::create($validatedData);
        $blog->categories()->sync($request->category_id);

        return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $category = Category::latest()->get();
        return view('backend.blog.create-and-edit', compact('blog', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->merge([
            'status' => $request->has('status') ? true : false,
        ]);

        $validatedData = $request->validate([
            'category_id' => 'required',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:300',
            'body' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024', // Max size: 1MB
            'status' => 'nullable|boolean',
        ]);

        // Generate slug from title
        // $slug = Str::slug($request->title);
        // $uniqueString = Str::random(6);
        // $validatedData['slug'] = $slug . '-' . $uniqueString;

        // Check if a new thumbnail image is uploaded
        if ($request->hasFile('thumbnail')) {
            if ($blog->thumbnail) {
                Storage::disk('public')->delete($blog->thumbnail);
            }

            // Save the new image
            $filePath = $request->file('thumbnail')->store('uploads/blogs', 'public');
            $validatedData['thumbnail'] = $filePath;
        }

        $blog->update($validatedData);
        $blog->categories()->sync($request->category_id);

        return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if ($blog->thumbnail) {
            Storage::disk('public')->delete($blog->thumbnail);
        }
        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully!');
    }
}
