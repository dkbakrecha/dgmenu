<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\BusinessItem;
use App\Models\MenuSection;
use App\Models\Post;

use App\Models\Feedback;
use App\Models\Room;
use App\Models\User;
use App\Models\Visitor;
use App\Models\BusinessListing;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Tag;


class PageController extends Controller
{
    public function home()
    {
        //return view('pages.index');
    }

    public function index()
    {
        $recipes = Recipe::with('category', 'tags')->orderBy('created_at', 'desc')->limit(6)->get();
        $categories = Category::all();
        return view('home', compact('recipes', 'categories'));
    }

    public function homebeta()
    {
        //return view('pages.homebeta');
    }

    public function homenew()
    {
        //return view('pages.homenew');
    }

    

    public function about()
    {
        $meta_title = "About Us | Authentic Recipe Platform - dgmenu.in";
        $meta_description = "Discover authentic, time-tested recipes from India and beyond on dgmenu.in. Explore free recipes collected from original cookbooks and culinary traditions, shared for every food lover.";

        return view('pages.about', compact('meta_title', 'meta_description'));
    }


    public function pricing()
    {
        return view('pages.pricing');
    }

    public function contact()
    {
        return view('pages/contact');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function privacyPolicy()
    {
        return view('pages.policy');
    }

    

    public function send_contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to('cgtdharm@gmail.com')->send(new ContactMail($request->all()));

        $apiToken = "6596953239:AAFqXvOHHsCS1452DYiUJU3hZZSpMY_g7K4"; 
 
        $data = [ 
        "chat_id" => "@dharmBiz", 
        "text" => json_encode($request->all())
        ]; 
        
        $response = file_get_contents("http://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) ); 

        return redirect()->back()->with('message', 'Thank you for your message. We will get back to you as soon as possible.');
    }

    public function dashboard()
    {
        
        if (Auth::check()) {
            if (Auth::user()->role == 1) {
                $users = User::where('status', '!=', 2)->get();
                $usersCount = $users->count();

                $visitors = Visitor::get();
                $visitorsCount = $visitors->count();

                return view('dashboard-admin', compact('usersCount', 'visitorsCount'));    
            } else {
                if(empty(Auth::user()->role)){
                    return redirect("welcome/role");
                }
                
                if (!empty($this->getBizId())) {
                    $itemCount = BusinessItem::where('user_id',  Auth::user()->id)->count();
                    $sectionCount = MenuSection::where('user_id', Auth::user()->id)->count();
                    $roomCount = Room::where('user_id', Auth::user()->id)->count();

                        // Feedback Counts (Based on Authenticated User's Business)
                    $totalFeedbacks = Feedback::where('business_id', $this->getBizId())->count();
                    $positiveFeedbacks = Feedback::where('business_id', $this->getBizId())->where('mood', 'happy')->count();
                    $neutralFeedbacks = Feedback::where('business_id', $this->getBizId())->where('mood', 'average')->count();
                    $negativeFeedbacks = Feedback::where('business_id', $this->getBizId())->where('mood', 'unhappy')->count();

                    // Fetch today's feedback count
$todayFeedbacks = Feedback::where('business_id', Auth::user()->id)
->whereDate('created_at', Carbon::today())->count();

                    // Feedback Trend Data
                    $feedbackTrends = Feedback::where('business_id', $this->getBizId())
                        ->selectRaw("DATE(created_at) as date, COUNT(*) as count")
                        ->groupBy('date')
                        ->orderBy('date')
                        ->get();


                    return view('dashboard', compact('itemCount', 
                    'sectionCount', 'roomCount',
                'totalFeedbacks',
                'todayFeedbacks',
            'positiveFeedbacks',
            'neutralFeedbacks',
            'negativeFeedbacks',
            'feedbackTrends'));
                } else {
                    return redirect("business/create");
                }
            }
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function editRole()
    {
        return view('pages.role');
    }

    public function updateRole(Request $request)
    {
        $role = $request->query('role');

        if (!in_array($role, [2, 3])) {
            return redirect()->route('update.role')->with('warning', 'Invalid role selection.');
        }

        $user = Auth::user();
        $user->role = $role;
        $user->save();

        return redirect()->route('board')->with('success', 'Profile updated successfully.');
    }

    public function business()
    {
        return view('pages.business');
    }

    public function resturents(Request $request)
    {
        $query = BusinessListing::query();

        if ($request->has('search')) {
            $query->where('business_name', 'like', '%' . $request->input('search') . '%');
            // Add more conditions if needed
        }

        if ($request->has('cuisine_type')) {
            $cuisineTypes = $request->input('cuisine_type');
            if (is_array($cuisineTypes) && !empty($cuisineTypes)) {
                foreach ($cuisineTypes as $cuisineType) {
                    $query->whereRaw("FIND_IN_SET(?, cuisine_type)", [$cuisineType]);
                }
            }
        }
        $query->orderBy('id', 'desc');

        $businessListings = $query->paginate(8);

        return view('pages.resturents', compact('businessListings'));
    }
}