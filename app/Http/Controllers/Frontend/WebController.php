<?php

namespace App\Http\Controllers\Frontend;

use App\Models\LetsTalk;
use App\Models\ContactUs;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdvisoryTeam;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CompanyLogo;
use App\Models\EventTeam;
use App\Models\LeadershipTeam;
use App\Models\Service;
use App\Models\Slider;
use App\Models\TechnologyTeam;

class WebController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $companyLogos = CompanyLogo::all();
        return view('frontend.index', compact('sliders', 'companyLogos'));
    }
    public function service()
    {
        $services = Service::all();
        return view('frontend.service', compact('services'));
    }
    public function advisor()
    {
        $advisorys = AdvisoryTeam::all();
        $technologys = TechnologyTeam::all();
        $events = EventTeam::all();
        return view('frontend.advisor', compact('technologys', 'events', 'advisorys'));
    }
    public function about()
    {
        $leaderships = LeadershipTeam::all();
        return view('frontend.about', compact('leaderships'));
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
