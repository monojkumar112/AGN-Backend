<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Speaking;

class SpeakingHighlights extends Component
{

    public $speaking_highlights = '';
    public $highlights;
    // Validation rules
    protected $rules = [
        'speaking_highlights' => 'required|string',
    ];

    public function save()
    {
        // Validate the form data
        $this->validate();

        // Retrieve the first Speaking record
        $highlights = Speaking::first();

        if ($highlights) {
            // Update the existing record
            $highlights->update(['my_speaking_highlights' => $this->speaking_highlights]);
            flash()->addSuccess('Data updated successfully!');
        } else {
            // Create a new record
            Speaking::create(['my_speaking_highlights' => $this->speaking_highlights]);
            flash()->addSuccess('Data saved successfully!');
        }
    }
    public function mount()
    {
        $this->highlights = Speaking::first();
        if ($this->highlights) {
            $this->speaking_highlights = $this->highlights->my_speaking_highlights;
        }
    }

    public function render()
    {
        return view('livewire.speaking-highlights');
    }
}
