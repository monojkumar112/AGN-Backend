<?php

namespace App\Http\Livewire;

use App\Models\Speaking;
use Livewire\Component;

class InspireTogether extends Component
{
    public $lets_inspire_together = '';
    public $inspire_together;
    // Validation rules
    protected $rules = [
        'lets_inspire_together' => 'required|string',
    ];

    public function save()
    {
        // Validate the form data
        $this->validate();

        // Retrieve the first Speaking record
        $inspire_together = Speaking::first();

        if ($inspire_together) {
            // Update the existing record
            $inspire_together->update(['lets_inspire_together' => $this->lets_inspire_together]);
            flash()->addSuccess('Data updated successfully!');
        } else {
            // Create a new record
            Speaking::create(['lets_inspire_together' => $this->lets_inspire_together]);
            flash()->addSuccess('Data saved successfully!');
        }
    }
    public function mount()
    {
        $this->inspire_together = Speaking::first();
        if ($this->inspire_together) {
            $this->lets_inspire_together = $this->inspire_together->lets_inspire_together;
        }
    }

    public function render()
    {
        return view('livewire.inspire-together');
    }
}
