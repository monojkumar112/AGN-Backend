<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TechnologyTeam;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class TechnologyTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologys = TechnologyTeam::latest()->get();
        return view('backend.technology.index', compact('technologys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.technology.create-and-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required|image',
            'logo' => 'required|image',
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
        $imagePath2 = null;
        if ($request->hasFile('logo')) {
            $image2 = $request->file('logo');
            $imageName2 = time() . '_' . pathinfo($image2->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
            $destinationPath2 = public_path('uploads/team');

            // Check if the directory exists, if not, create it
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Convert and save the image as WebP
            $img = Image::make($image2)->encode('webp', 90); // 90 is the quality (0-100)
            $img->save($destinationPath2 . '/' . $imageName2);

            $imagePath2 = 'uploads/team/' . $imageName2;
        }
        TechnologyTeam::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imagePath,
            'logo' => $imagePath2,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('admin.technology.index')->with('success', 'Technology Team created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $technology = TechnologyTeam::findOrFail($id);
        return view('backend.technology.create-and-edit', compact('technology'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TechnologyTeam $technology)
    {
        $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'image' => 'nullable|image',
            'logo' => 'nullable|image',
        ]);

        // Existing image paths
        $imagePath = $technology->image;
        $logoPath = $technology->logo;

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
            if (File::exists(public_path($technology->image))) {
                File::delete(public_path($technology->image));
            }
        }

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . pathinfo($logo->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
            $destinationPath = public_path('uploads/team');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $img = Image::make($logo)->encode('webp', 90);
            $img->save($destinationPath . '/' . $logoName);

            $logoPath = 'uploads/team/' . $logoName;

            // Optional: delete old logo
            if (File::exists(public_path($technology->logo))) {
                File::delete(public_path($technology->logo));
            }
        }

        // Update the technology team member
        $technology->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imagePath,
            'logo' => $logoPath,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('admin.technology.index')->with('success', 'Technology team updated successfully.');
    }


    public function destroy(TechnologyTeam $technology)
    {
        // Delete image if it exists
        if ($technology->image && File::exists(public_path($technology->image))) {
            File::delete(public_path($technology->image));
        }

        // Delete logo if it exists
        if ($technology->logo && File::exists(public_path($technology->logo))) {
            File::delete(public_path($technology->logo));
        }

        // Delete record from DB
        $technology->delete();

        return redirect()->route('admin.technology.index')->with('success', 'Technology team deleted successfully.');
    }

}
