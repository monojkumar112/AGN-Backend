<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdvisoryTeam;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class AdvisoryTeamController extends Controller
{


    public function index()
    {
        $advisorys = AdvisoryTeam::latest()->get();
        return view('backend.advisory.index', compact('advisorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.advisory.create-and-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'nullable|image',
            'logo' => 'nullable|image',
        ]);

        $imagePath = $request->hasFile('image') ? $this->handleWebpUpload($request->file('image')) : null;
        $logoPath = $request->hasFile('logo') ? $this->handleWebpUpload($request->file('logo')) : null;

        AdvisoryTeam::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imagePath,
            'logo' => $logoPath,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('admin.advisory.index')->with('success', 'Advisory team member created successfully.');
    }
    private function handleWebpUpload($file)
    {
        $imageName = time() . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
        $destinationPath = public_path('uploads/team');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $img = Image::make($file)->encode('webp', 90);
        $img->save($destinationPath . '/' . $imageName);

        return 'uploads/team/' . $imageName;
    }
    /**
     * Display the specified resource.
     */
    public function show(AdvisoryTeam $advisoryTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $advisory = AdvisoryTeam::findOrFail($id);
        return view('backend.advisory.create-and-edit', compact('advisory'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdvisoryTeam $advisory)
    {
        $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'image' => 'nullable|image',
            'logo' => 'nullable|image',
        ]);

        // Existing image paths
        $imagePath = $advisory->image;
        $logoPath = $advisory->logo;

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
            if (File::exists(public_path($advisory->image))) {
                File::delete(public_path($advisory->image));
            }
        }

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . pathinfo($logo->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
            $destinationPath2 = public_path('uploads/team');

            if (!File::exists($destinationPath2)) {
                File::makeDirectory($destinationPath2, 0755, true);
            }

            $img = Image::make($logo)->encode('webp', 90);
            $img->save($destinationPath2 . '/' . $logoName);

            $logoPath = 'uploads/team/' . $logoName;

            // Optional: delete old logo
            if (File::exists(public_path($advisory->logo))) {
                File::delete(public_path($advisory->logo));
            }
        }

        // Update the advisory team member
        $advisory->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imagePath,
            'logo' => $logoPath,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('admin.advisory.index')->with('success', 'Advisory team member updated successfully.');
    }


    public function destroy(AdvisoryTeam $advisory)
    {
        // Delete image if it exists
        if ($advisory->image && File::exists(public_path($advisory->image))) {
            File::delete(public_path($advisory->image));
        }

        // Delete logo if it exists
        if ($advisory->logo && File::exists(public_path($advisory->logo))) {
            File::delete(public_path($advisory->logo));
        }

        // Delete record from DB
        $advisory->delete();

        return redirect()->route('admin.advisory.index')->with('success', 'Advisory team member deleted successfully.');
    }

}
