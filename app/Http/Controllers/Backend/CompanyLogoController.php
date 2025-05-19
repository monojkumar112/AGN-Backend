<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CompanyLogo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class CompanyLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companys = CompanyLogo::latest()->get();
        return view('backend.company.index', compact('companys'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.company.create-and-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
            $destinationPath = public_path('uploads/comapny');

            // Check if the directory exists, if not, create it
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Convert and save the image as WebP
            $img = Image::make($image)->encode('webp', 90); // 90 is the quality (0-100)
            $img->save($destinationPath . '/' . $imageName);

            $imagePath = 'uploads/comapny/' . $imageName;
        }
        CompanyLogo::create([
            'name' => $request->name,
            'image' => $imagePath,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('admin.company.index')->with('success', 'Company Logo created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(CompanyLogo $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = CompanyLogo::findOrFail($id);
        return view('backend.company.create-and-edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyLogo $company)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
        ]);

        $imagePath = $company->image; // default to existing image path

        if ($request->hasFile('image')) {
            // Delete old image
            if (File::exists(public_path($company->image))) {
                File::delete(public_path($company->image));
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

        $company->update([
            'name' => $request->name,
            'status' => $request->status ?? true,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.company.index')->with('success', 'Company Logo updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyLogo $company)
    {
        // Delete image from server
        if ($company->image && File::exists(public_path($company->image))) {
            File::delete(public_path($company->image));
        }

        // Delete company record from database
        $company->delete();

        return redirect()->route('admin.company.index')->with('success', 'Company Logo deleted successfully.');
    }

}
