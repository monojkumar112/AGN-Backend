<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LeadershipTeam;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class LeadershipTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaderships = LeadershipTeam::latest()->get();
        return view('backend.leadership.index', compact('leaderships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.leadership.create-and-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'short_description' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
            $destinationPath = public_path('uploads/team');

            // Check if the directory exists, if not, create it
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Convert and save the image as WebP
            $img = Image::make($image)->encode('webp', 90); // 90 is the quality (0-100)
            $img->save($destinationPath . '/' . $imageName);

            $imagePath = 'uploads/team/' . $imageName;
        }

        LeadershipTeam::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'short_description' => $request->short_description,
            'image' => $imagePath,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $leadership = LeadershipTeam::findOrFail($id);
        return view('backend.leadership.create-and-edit', compact('leadership'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, leadershipTeam $leadership)
    {
        $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'short_description' => 'required|string',
            'image' => 'nullable|image',
        ]);

        // Existing image paths
        $imagePath = $leadership->image;

        // Handle image upload if new file is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
            $destinationPath = public_path('uploads/team');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $img = Image::make($image)->encode('webp', 90);
            $img->save($destinationPath . '/' . $imageName);

            $imagePath = 'uploads/team/' . $imageName;

            // Optional: delete old image if needed
            if (File::exists(public_path($leadership->image))) {
                File::delete(public_path($leadership->image));
            }
        }


        // Update the leadership team member
        $leadership->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'short_description' => $request->short_description,
            'image' => $imagePath,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership  updated successfully.');
    }


    public function destroy(LeadershipTeam $leadership)
    {
        // Delete image if it exists
        if ($leadership->image && File::exists(public_path($leadership->image))) {
            File::delete(public_path($leadership->image));
        }

        // Delete logo if it exists
        if ($leadership->logo && File::exists(public_path($leadership->logo))) {
            File::delete(public_path($leadership->logo));
        }

        // Delete record from DB
        $leadership->delete();

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership deleted successfully.');
    }

}
