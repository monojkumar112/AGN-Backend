<?php

namespace App\Http\Controllers\Frontend;

use App\Models\LetsTalk;
use App\Models\ContactUs;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\Speaking;
use App\Models\SpeakingLogoSlide;
use App\Models\WatchNow;
use JsonException;
use Spatie\Newsletter\Newsletter;

class WebController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function service()
    {
        return view('frontend.service');
    }
    public function advisor()
    {
        return view('frontend.advisor');
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function donate()
    {
        return view('frontend.donate');
    }
    public function achiaNila()
    {
        return view('frontend.nila');
    }


    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string',
        ]);

        ContactUs::create([
            'name' => $request->name,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'status' => true, // or false if you want to set it manually
        ]);

        notify()->success("Contact submitted successfully", "Success");
        return redirect()->back();
    }









}
