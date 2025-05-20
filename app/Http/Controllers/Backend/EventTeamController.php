<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EventTeam;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class EventTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = EventTeam::latest()->get();
        return view('backend.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.event.create-and-edit');
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
        EventTeam::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imagePath,
            'logo' => $imagePath2,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('admin.event.index')->with('success', 'Event Team created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = EventTeam::findOrFail($id);
        return view('backend.event.create-and-edit', compact('event'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventTeam $event)
    {
        $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'image' => 'nullable|image',
            'logo' => 'nullable|image',
        ]);

        // Existing image paths
        $imagePath = $event->image;
        $logoPath = $event->logo;

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
            if (File::exists(public_path($event->image))) {
                File::delete(public_path($event->image));
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
            if (File::exists(public_path($event->logo))) {
                File::delete(public_path($event->logo));
            }
        }

        // Update the event team member
        $event->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imagePath,
            'logo' => $logoPath,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('admin.event.index')->with('success', 'Event team updated successfully.');
    }


    public function destroy(EventTeam $event)
    {
        // Delete image if it exists
        if ($event->image && File::exists(public_path($event->image))) {
            File::delete(public_path($event->image));
        }

        // Delete logo if it exists
        if ($event->logo && File::exists(public_path($event->logo))) {
            File::delete(public_path($event->logo));
        }

        // Delete record from DB
        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Event team deleted successfully.');
    }

}
