<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Speaking;

class TopicsISpeakOn extends Component
{

    public $topics_i_speak_on = '';
    public $topics;
    // Validation rules
    protected $rules = [
        'topics_i_speak_on' => 'required|string',
    ];

    public function save()
    {
        // Validate the form data
        $this->validate();

        // Retrieve the first Speaking record
        $topics = Speaking::first();

        if ($topics) {
            // Update the existing record
            $topics->update(['topics_i_speak_on' => $this->topics_i_speak_on]);
            flash()->addSuccess('Data updated successfully!');
        } else {
            // Create a new record
            Speaking::create(['topics_i_speak_on' => $this->topics_i_speak_on]);
            flash()->addSuccess('Data saved successfully!');
        }
    }
    public function mount()
    {
        $this->topics = Speaking::first();
        if ($this->topics) {
            $this->topics_i_speak_on = $this->topics->topics_i_speak_on;
        }
    }

    public function render()
    {
        return view('livewire.topics-i-speak-on');
    }
}
