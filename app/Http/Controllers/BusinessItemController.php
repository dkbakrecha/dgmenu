<?php

namespace App\Http\Controllers;

use App\Models\BusinessItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');

        $businessItem = BusinessItem::select('*')->where('user_id', Auth::user()->id)->orderBy('id', 'desc');

        if(!empty($request->filter)){
            $searchFields = ['title'];

            $businessItem->where(function($query) use($request, $searchFields){
                $searchWildcard = '%' . $request->filter . '%';
                foreach($searchFields as $field){
                $query->orWhere($field, 'LIKE', $searchWildcard);
                }
            });
        }

        $businessItem = $businessItem->paginate(10)
                        ->withQueryString();

        return view('business_item.index', compact('businessItem', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business_item.create');
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
        $businessData['business_id'] = $this->getBizId();

        if($request->has('menu_image')){
            $image = $request->file('menu_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'),$imageName);

            $businessData['menu_image'] = $imageName;
        }else{
            $businessData['menu_image'] = "";
        }
        //dd($businessData);
        BusinessItem::create($businessData);

        return redirect()->route('business_item.index')->with('message', 'Item created successfully');
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
        $businessItem = BusinessItem::find($id);
        return view('business_item.edit', compact('businessItem'));
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
        $businessData = BusinessItem::findOrFail($id);
        
        if($request->has('menu_image')){
            $image = $request->file('menu_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'),$imageName);

            $businessData->menu_image = $imageName;
        }

        $businessData->user_id = Auth::id();
        $businessData->title = $request->title;
        $businessData->business_id = $this->getBizId();
        $businessData->description = $request->description;
        $businessData->price = $request->price;
        $businessData->price_min = $request->price_min;
        $businessData->section_id = $request->section_id;
        $businessData->item_order = $request->item_order;
        $businessData->save();
        
        return redirect()->route('business_item.index')->with('message', 'business Item updated successfully');
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
