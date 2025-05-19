<?php

namespace App\Http\Controllers\Backend;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use App\Models\LetsTalk;
use App\Models\Subscriber;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{

    public function dashboard()
    {
        $data = [];
        $data['contact'] = ContactUs::count();
        $data['subscribers'] = Subscriber::count();
        $data['lets_talk'] = LetsTalk::count();
        $data['total_blogs'] = Blog::count();
        $data['courses'] = Course::count();
        $data['popular_weekends'] = Blog::popularThisWeek()->get();
        $data['popular_this_month'] = Blog::popularThisMonth()->get();

        return view('backend.dashboard', $data);
    }
    public function popular_between(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $popular_between = Blog::popularBetween($start_date, $end_date)->get();


        return response()->json([
            'success' => true,
            'message' => 'Data retrieved successfully',
            'data' => $popular_between,
        ]);
    }
}
