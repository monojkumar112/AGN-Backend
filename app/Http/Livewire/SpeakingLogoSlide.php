<?php

namespace App\Http\Livewire;

use App\Models\SpeakingLogoSlide as ModelsSpeakingLogoSlide;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class SpeakingLogoSlide extends Component
{
    public $data;
    public $editId;
    use WithFileUploads;

    public $image;

    public function rules()
    {
        return [
            'image' => 'required|image|max:1024', // 1MB max
        ];
    }

    public function save()
    {
        $this->validate();
        $path = $this->image->store('spaking/accolades-images', 'public');


        // Save $path to DB or handle as needed
        ModelsSpeakingLogoSlide::create(['image' => $path]);

        flash()->addSuccess('success', 'Image uploaded successfully!');
        $this->reset('image');
    }

    public function deleteRecord($id)
    {
        $record = ModelsSpeakingLogoSlide::find($id);
        // dd($record->image);

        if ($record) {
            $filePath = $record->image;
            // Delete the associated image if it exists
            if (!empty($filePath) && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            } else {
                Log::warning('File not found or path is null: ' . ($filePath ?? 'NULL'));
            }

            // Delete the record from the database
            $record->delete();
            flash()->addSuccess('Record deleted');
        }
    }

    public function render()
    {
        $this->data = ModelsSpeakingLogoSlide::latest()->get();
        return view('livewire.speaking-logo-slide');
    }
}
