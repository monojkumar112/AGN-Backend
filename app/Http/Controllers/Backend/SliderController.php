<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.slider.create-and-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'description' => 'required',
            'btn_text' => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
            $destinationPath = public_path('uploads/tutorial');

            // Check if the directory exists, if not, create it
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Convert and save the image as WebP
            $img = Image::make($image)->encode('webp', 90); // 90 is the quality (0-100)
            $img->save($destinationPath . '/' . $imageName);

            $imagePath = 'uploads/tutorial/' . $imageName;
        }
        Slider::create([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'btn_text' => $request->btn_text,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.create-and-edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'btn_text' => 'required',
            'image' => 'nullable|image',
        ]);

        $imagePath = $slider->image; // default to existing image path

        if ($request->hasFile('image')) {
            // Delete old image
            if (File::exists(public_path($slider->image))) {
                File::delete(public_path($slider->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
            $destinationPath = public_path('uploads/tutorial');

            // Create folder if not exists
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Convert to WebP and save
            $img = Image::make($image)->encode('webp', 90);
            $img->save($destinationPath . '/' . $imageName);

            $imagePath = 'uploads/tutorial/' . $imageName;
        }

        $slider->update([
            'name' => $request->name,
            'description' => $request->description,
            'btn_text' => $request->btn_text,
            'status' => $request->status ?? true,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        // Delete image from server
        if ($slider->image && File::exists(public_path($slider->image))) {
            File::delete(public_path($slider->image));
        }

        // Delete slider record from database
        $slider->delete();

        return redirect()->route('admin.slider.index')->with('success', 'Slider deleted successfully.');
    }

}
