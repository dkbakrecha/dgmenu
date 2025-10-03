<?php

namespace App\Http\Controllers;

use App\Models\BusinessListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BusinessImage;

class BusinessListingController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');

        $businessListing = BusinessListing::select('*')->orderBy('id', 'desc');

        if(!empty($request->filter)){
            $searchFields = ['title'];

            $businessListing->where(function($query) use($request, $searchFields){
                $searchWildcard = '%' . $request->filter . '%';
                foreach($searchFields as $field){
                $query->orWhere($field, 'LIKE', $searchWildcard);
                }
            });
        }

        $businessListing->with('images');

        $businessListing = $businessListing->paginate(10)
                        ->withQueryString();

        return view('business_listing.index', compact('businessListing', 'filter'));
    }

    public function create()
    {
        return view('business_listing.create');
    }

   
    public function store(Request $request)
    {
        $businessData = $request->all();
        $businessData['user_id'] = Auth::id();
        BusinessListing::create($businessData);

        return redirect()->route('business_listing.index')->with('message', 'Business created successfully');
    }

    public function edit($id)
    {
        $businessListing = BusinessListing::find($id);
        return view('business_listing.edit', compact('businessListing'));
    }

    public function update(Request $request, $id)
    {
        // the update method, only fire its events when the update happens directly on the model,
        // so we will use save directly on modal instead of mass assignment
        $businessData = BusinessListing::findOrFail($id);
        
        if($request->has('logo')){
            $image = $request->file('logo');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('images'),$imageName);
           // $request->merge(['logo' => $imageName]);

            $businessData->logo = $imageName;
        }
        
        $businessData->user_id = Auth::id();
        $businessData->business_name = $request->business_name;
        $businessData->business_description = $request->business_description;
        $businessData->contact_email = $request->contact_email;
        $businessData->contact_phone = $request->contact_phone;
        $businessData->zip_code = $request->zip_code;
        $businessData->location = $request->location;
        $businessData->map_address = $request->map_address;

        $businessData->website = $request->website;
        $businessData->facebook_page = $request->facebook_page;
        $businessData->instagram_page = $request->instagram_page;
        
        $businessData->save();

        if($request->has('logo')){
            $image = $request->file('logo');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('images'),$imageName);
           // $request->merge(['logo' => $imageName]);

            $businessData->logo = $imageName;
        }
     

        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                BusinessImage::create([
                    'business_listing_id' => $businessData->id,
                    'image_path' => $path
                ]);
            }
        }
        
        return redirect()->back()->with('message', 'business updated successfully');
    }

    public function view($id)
    {
        $businessListing = BusinessListing::with(['reviews', 'images'])->find($id);
        if (!$businessListing) {
            return redirect()->route('businesses.index')->with('error', 'Business not found');
        }
        return view('business_listing.view', compact('businessListing'));
    }

    public function deleteImage($id, $imageId)
    {
        $image = BusinessImage::where('business_listing_id', $id)->findOrFail($imageId);
        // Delete the image file from storage
        \Storage::disk('public')->delete($image->image_path);
        // Delete the image record from the database
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

    public function destroy($id)
{
    // Logic for deleting a resource
}

public function toggleStatus($id, Request $request)
{
    $businessListing = BusinessListing::findOrFail($id);
    $businessListing->status = $request->status;
    $businessListing->save();

    return response()->json(['success' => true]);
}
}
