<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Speaking;
use App\Models\WatchNow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpeakingWatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $watch_data = WatchNow::find($id);
        return view('backend.speaking.watch-now', compact('watch_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $watch = WatchNow::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required',
            'description' => 'required|string',
        ]);

        $data = [
            'title' => $request->title,
            'video' => $request->video,
            'description' => $request->description
        ];

        //upload video
        if ($request->image) {
            // Validate the image
            $request->validate([
                'image' => 'required|max:2048', // 2MB Max
            ]);

            // Delete the old image if it exists
            if ($watch->image) {
                Storage::disk('public')->delete($watch->image);
            }

            // Store the new image in the 'speaking/images' folder
            $imagUrl = $request->image->store('spaking/images', 'public');
            $data['image'] = $imagUrl;
        }

        $watch->update($data);
        flash()->addSuccess('Data saved successfully!');
        return redirect()->route('admin.speaking');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
