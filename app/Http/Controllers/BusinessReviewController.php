<?php

namespace App\Http\Controllers;

use App\Models\BusinessReview;
use App\Models\BusinessListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessReviewController extends Controller
{
    public function store(Request $request, BusinessListing $business)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'email' => 'nullable|required_without:phone_number|email|max:255',
            'phone_number' => 'nullable|required_without:email|string|max:15',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $reviewData = $request->all();
        $reviewData['user_id'] = Auth::check() ? Auth::id() : 0;

        $review = new BusinessReview($reviewData);
        $business->reviews()->save($review);

        $business->total_reviews++;
        $business->avg_rating = ($business->avg_rating * ($business->total_reviews - 1) + $review->rating) / $business->total_reviews;
        $business->save();

        return redirect()->route('biz', $business);
    }
    
}
