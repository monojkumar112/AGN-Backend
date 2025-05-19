<?php

namespace App\Http\Livewire;

use App\Models\Speaking;
use Livewire\Component;

class BookMe extends Component
{
    public $why_book_me = '';
    public $book_me;
    // Validation rules
    protected $rules = [
        'why_book_me' => 'required|string',
    ];

    public function save()
    {
        // Validate the form data
        $this->validate();

        // Retrieve the first Speaking record
        $book_me = Speaking::first();

        if ($book_me) {
            // Update the existing record
            $book_me->update(['why_book_me' => $this->why_book_me]);
            flash()->addSuccess('Data updated successfully!');
        } else {
            // Create a new record
            Speaking::create(['why_book_me' => $this->why_book_me]);
            flash()->addSuccess('Data saved successfully!');
        }
    }
    public function mount()
    {
        $this->book_me = Speaking::first();
        if ($this->book_me) {
            $this->why_book_me = $this->book_me->why_book_me;
        }
    }

    public function render()
    {
        return view('livewire.book-me');
    }
}
