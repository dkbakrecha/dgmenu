<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function showFeedbacks()
    {
        //dd("ssss");
        $business = Business::findOrFail($this->getBizId());

        //$business = auth()->user()->business; // Assuming the client owns a business
        $feedbacks = $business->feedbacks()->latest()->get();

        return view('business.feedbacks', compact('feedbacks', 'business'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $businessData = $request->all();
        $businessData['user_id'] = Auth::id();
        $businessData['logo'] = "";
        Business::create($businessData);

        return redirect()->route('board')->with('message', 'Questions created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $business = Business::find($id);
        return view('business.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // the update method, only fire its events when the update happens directly on the model,
        // so we will use save directly on modal instead of mass assignment
        $businessData = Business::findOrFail($id);
        
        if($request->has('logo')){
            $image = $request->file('logo');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('images'),$imageName);
           // $request->merge(['logo' => $imageName]);

            $businessData->logo = $imageName;
        }

        $businessData->user_id = Auth::id();
        $businessData->title = $request->title;
        $businessData->slug = Str::slug($request->title, '-');
        $businessData->description = $request->description;
        $businessData->email_address = $request->email_address;
        $businessData->address = $request->address;
        $businessData->contact = $request->contact;
        $businessData->theme = $request->theme;
        $businessData->save();
        
        return redirect()->route('board')->with('message', 'business updated successfully');
    }

    
    public function bizThemes()
    {
        $business = Business::find($this->getBizId());
        $businessThemes = [
            'default' => 'Default',
            'minimenu' => 'Mini Menu',
            'black-cafe' => 'Black Cafe',
            'cream-blue' => 'Cream Blue',
            'mercury-menu' => 'Mercury Menu',
            'big-moon' => 'Big Moon',
            'black-board' => 'Black Board',
            'blood-red' => 'Bloody Red'
        ];
        return view('business.biz_theme', compact('business', 'businessThemes'));
    }

    public function updateTheme(Request $request)
    {
        // the update method, only fire its events when the update happens directly on the model,
        // so we will use save directly on modal instead of mass assignment
        $businessData = Business::findOrFail($this->getBizId());
        $businessData->theme = $request->theme;
        $businessData->save();
        
        return redirect()->route('themes')->with('message', 'business updated successfully');
    }

    public function updatePreview(Request $request)
    {
        // the update method, only fire its events when the update happens directly on the model,
        // so we will use save directly on modal instead of mass assignment
        
        $businessData = Business::findOrFail($request->business_id);
        $businessData->theme = $request->theme;
        $businessData->save();
        
        return redirect()->route('roomSpace',[$request->room_id])->with('message', 'business updated successfully');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
