<?php

namespace App\Http\Livewire;

use App\Models\Speaking;
use Livewire\Component;
use Carbon\Carbon;


class Testimonial extends Component
{
    // Define properties for the form fields
    public $title;
    public $description;
    public $author;
    public $speakingId;
    public $fetch_data;

    // Define a property to store the JSON data
    public $previousData = [];

    // Validation rules
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'author' => 'required|string|max:255',
    ];

    // Save the form data
    public function save()
    {
        // Validate the form data
        $this->validate();
        $newId = count($this->previousData) + 1;

        // Combine the form data into a JSON object
        $newEntry = [
            'id' => $newId,
            'title' => $this->title,
            'description' => $this->description,
            'author' => $this->author,
            'created_at' => Carbon::now(),
        ];
        $this->previousData[] = $newEntry;

        $speaking = Speaking::first();
        if ($speaking) {
            $speaking->update(['testimonial' => json_encode($this->previousData)]);
        } else {
            Speaking::create(['testimonial' => json_encode($this->previousData)]);
        }




        // Reset the form fields
        $this->reset(['title', 'description', 'author']);

        // Emit an event or show a success message
        session()->flash('message', 'Data saved successfully!');
    }

    public function deleteItem($id)
    {
        // Fetch the JSON data from the database
        $speaking = Speaking::first();


        if ($speaking) {
            // Decode the JSON data
            $testimonials = json_decode($speaking->testimonial, true);

            // Find and remove the item with the given ID
            $testimonials = array_filter($testimonials, function ($item) use ($id) {
                return $item['id'] != $id;
            });

            // Re-index the array (optional, if you want to reset array keys)
            $testimonials = array_values($testimonials);

            // Update the JSON data in the database
            $speaking->update(['testimonial' => json_encode($testimonials)]);
        }
    }

    public function render()
    {
        $this->fetch_data = json_decode(Speaking::first()?->testimonial ?? '[]');
        $this->previousData = $this->fetch_data;
        return view('livewire.testimonial');
    }
}
