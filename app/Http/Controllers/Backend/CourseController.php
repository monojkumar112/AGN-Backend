<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->get();
        return view('backend.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.course.create-or-update');
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
            'name' => 'required|string|max:255',
            'message' => 'nullable|string|max:255',
            'description' => 'required|string',
            'short_description' => 'required|string',
            'duration' => 'nullable|string|max:50',
            'total_time' => 'nullable|string|max:50',
            'price' => 'nullable',
            'discount_price' => 'nullable',
            'course_summary' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Max 2MB
            'status' => 'nullable|boolean',
        ]);


        $validatedData['slug'] = Str::slug($request->name) . '-' . Str::random(6);
        // Handle image upload
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('uploads/courses', 'public');
            $validatedData['image'] = $filePath;
        }

        $validatedData['status'] = $request->has('status') ? true : false;
        Course::create($validatedData);

        return redirect()->route('admin.course.index')->with('success', 'Course created successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('backend.course.create-or-update', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {

        $request->merge([
            'status' => $request->has('status') ? true : false,
        ]);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'nullable|string|max:255',
            'description' => 'required|string',
            'short_description' => 'required|string',
            'duration' => 'nullable|string|max:50',
            'total_time' => 'nullable|string|max:50',
            'price' => 'nullable',
            'discount_price' => 'nullable',
            'course_summary' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Max 2MB
            'status' => 'nullable|boolean',
        ]);


        if ($validatedData['name'] !== $course->name) {
            $validatedData['slug'] = Str::slug($validatedData['name']) . '-' . Str::random(6);
        }

        if ($request->hasFile('image')) {
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $validatedData['image'] = $request->file('image')->store('uploads/courses', 'public');
        }

        $course->update($validatedData);
        return redirect()->route('admin.course.index')->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect()->back()->with('success', 'Course deleted successfully!');
    }
}
