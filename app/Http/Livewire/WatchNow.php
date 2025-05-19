<?php

namespace App\Http\Livewire;

use App\Models\Speaking;
use App\Models\WatchNow as ModelsWatchNow;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class WatchNow extends Component
{
    use WithFileUploads;
    public $description = '';
    public $title = '';
    public $video = '';
    public $image;
    public $spiking;
    public $data;
    // Validation rules
    protected $rules = [
        'title' => 'required|string|max:1000',
        'description' => 'required|string',
        'video' => 'nullable',
        'image' => 'nullable|max:2048',
    ];

    protected function getListeners()
    {
        return ['watchCreate' => 'watchCreate'];
    }

    public function save()
    {
        $data = [
            'title' => $this->title,
            'video' => $this->video,
            'description' => $this->description
        ];
        //upload video
        if ($this->image) {
            // Validate the image
            $this->validate([
                'image' => 'required|max:2048', // 2MB Max
            ]);

            // Delete the old image if it exists
            if ($this->spiking && isset($this->data['image'])) {
                Storage::disk('public')->delete($this->data['image']);
            }

            // Store the new image in the 'spaking/images' folder
            $imagUrl = $this->image->store('spaking/images', 'public');
            $data['image'] = $imagUrl;
        } else {
            $data['image'] = $this->data['image'] ?? null;
        }


        // Validate the form data
        $this->validate();

        ModelsWatchNow::create($data);
        $this->emit('watchNowUpdated');
        flash()->addSuccess('Data saved successfully!');
    }




    public function render()
    {
        return view('livewire.watch-now');
    }
}
