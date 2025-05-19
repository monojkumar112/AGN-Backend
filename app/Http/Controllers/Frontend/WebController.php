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
    public function courses()
    {
        $courses = Course::where('status', 1)->latest()->get();
        // dd($courses);
        return view('frontend.courses', ['courses' => $courses]);
    }
    public function coursedetails($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $course->visit();
        // $total_visitor = Course::withTotalVisitCount()->where('slug', $slug)->first()->visit_count_total;
        // dd($total_visitor);
        return view('frontend.coursedetails', ['course' => $course]);
    }
    public function games()
    {
        return view('frontend.games');
    }
    public function games2()
    {
        return view('frontend.games2');
    }
    public function games3()
    {
        return view('frontend.games3');
    }
    public function podcast()
    {
        return view('frontend.podcast');
    }
    public function blog()
    {
        $category = Category::latest()->get();
        $blogs = Blog::where('status', 1)->latest()->simplePaginate(8);
        // $blogs = Blog::where('status', 1)->first();
        // dd($blogs->categories);
        return view('frontend.blog', [
            'categories' => $category,
            'blogs' => $blogs
        ]);
    }
    public function blog_detail($slug)
    {
        $blog = Blog::withTotalVisitCount()->where('slug', $slug)->first();
        $blog->visit();
        $recent_post = Blog::popularThisMonth()->where('status', 1)->latest()->limit(10)->get();
        // dd($blog);

        return view('frontend.blogpost', ['blog' => $blog, 'recent_post' => $recent_post]);
    }
    public function speaking()
    {
        $speaking = Speaking::first();

        $rawTestimonials = json_decode($speaking->testimonial);
        $testimonials = collect($rawTestimonials)->map(function ($item) {
            return [
                'title' => $item->title,
                'review' => trim($item->description),
                'author' => $item->author,
            ];
        })->toArray();

        $inspiring_change = $speaking->inspiring_change;
        $topics_i_speak_on = $speaking->topics_i_speak_on;
        $my_speaking_highlights = $speaking->my_speaking_highlights;
        $why_book_me = $speaking->why_book_me;
        $lets_inspire_together = $speaking->lets_inspire_together;


        $watch_first = WatchNow::first();
        $watch_now = WatchNow::where('id', '!=', $watch_first->id)->get();

        $logos = SpeakingLogoSlide::all();

        // dd($logos);

        return view('frontend.speaking', compact('testimonials', 'inspiring_change', 'topics_i_speak_on', 'my_speaking_highlights', 'why_book_me', 'lets_inspire_together', 'watch_first', 'watch_now', 'logos'));
    }
    public function consulting()
    {
        return view('frontend.consulting');
    }
    public function coaching()
    {
        return view('frontend.coaching');
    }

    public function contactStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'book_me' => 'nullable|array',
        ]);

        // Combine book_me array into a string (optional if required)
        $bookMeDetails = $request->has('book_me') ? implode(', ', $request->input('book_me')) : null;

        // Create a new ContactUs record
        $contact = ContactUs::create([
            'name' => $request->input('name'),
            'company' => $request->input('company'),
            'email' => $request->input('email'),
            'subject' => $bookMeDetails,
            'message' => $request->input('message'),
        ]);

        notify()->success("Contact successful", "Success");
        if ($contact) {
            return redirect()->back();
        }
        return redirect()->back()->withInput();
    }

    public function subscriberStore(Request $request)
    {

        $email = $request->email;
        // Newsletter::subscribe($email);
        // notify()->success("Subscribed successful", "Success");
        // return redirect()->back();



        $request->validate([
            'email' => 'required',
        ]);
        $subscriber = Subscriber::create([
            'email' => $request->email,
        ]);
        notify()->success("Subscribed successful", "Success");
        if ($subscriber) {
            return redirect()->back();
        }
        return redirect()->back()->withInput();
    }






    public function letsTalkStore(Request $request)
    {
        $request->validate([
            'to_email' => 'required',
            'from_email' => 'required',
            'message' => 'required',
        ]);
        $lets_talk = LetsTalk::create([
            'to_email' => $request->to_email,
            'from_email' => $request->from_email,
            'message' => $request->message,
        ]);
        notify()->success("Message successful Sent", "Success");
        if ($lets_talk) {
            return redirect()->back();
        }
        return redirect()->back()->withInput();
    }
}
