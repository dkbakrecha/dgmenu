<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request, $slug)
    {
        // Fetch business information based on the slug
        $business = \DB::table('business')->where('slug', $slug)->first();

        if (!$business) {
            abort(404, 'Business not found');
        }
//dd($userInfo);
        // Pass business information (including logo) and user info to the view
        return view('feedback.index', [
            'business' => $business,
        ]);
    }

    public function submit(Request $request)
    {   
        // Validate the incoming request
        $data = $request->validate([
            'mood' => 'required|string',
            'feedback' => 'nullable|string',
            'full_name' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'business_id' => 'integer',
        ]);

        $data['user_info'] = ['full_name' => $data['full_name'], 'phone_number' => $data['phone_number']];
    //dd($data);
        
        // Store feedback in the database
        \DB::table('feedbacks')->insert([
            'business_id' => $data['business_id'],
            'mood' => $data['mood'],
            'feedback' => $data['feedback'],
            'user_info' => json_encode($data['user_info']),
            'browser_info' => $request->header('User-Agent'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('feedback.thankYou');
    }

    public function thankYou()
    {
        return view('feedback.thank-you');
    }
}
