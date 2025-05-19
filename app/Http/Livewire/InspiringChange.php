<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Speaking;
use Carbon\Carbon;

class InspiringChange extends Component
{
    public $inspiring_input = '';
    public $speaking;
    // Validation rules
    protected $rules = [
        'inspiring_input' => 'required|string|max:1000',
    ];

    public function save()
    {
        // Validate the form data
        $this->validate();

        // Retrieve the first Speaking record
        $speaking = Speaking::first();

        if ($speaking) {
            // Update the existing record
            $speaking->update(['inspiring_change' => $this->inspiring_input]);
            flash()->addSuccess('Data updated successfully!');
        } else {
            // Create a new record
            Speaking::create(['inspiring_change' => $this->inspiring_input]);
            flash()->addSuccess('Data saved successfully!');
        }
    }
    public function mount()
    {
        $this->speaking = Speaking::first();
        if ($this->speaking) {
            $this->inspiring_input = $this->speaking->inspiring_change;
        }
    }

    public function render()
    {
        return view('livewire.inspiring-change');
    }
}
