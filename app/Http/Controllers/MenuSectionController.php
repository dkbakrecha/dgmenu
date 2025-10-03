<?php

namespace App\Http\Controllers;

use App\Models\MenuSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');

        $menuItem = MenuSection::select('*')->where('user_id', Auth::user()->id)->orderBy('id', 'desc');

        if(!empty($request->filter)){
            $searchFields = ['title'];

            $menuItem->where(function($query) use($request, $searchFields){
                $searchWildcard = '%' . $request->filter . '%';
                foreach($searchFields as $field){
                $query->orWhere($field, 'LIKE', $searchWildcard);
                }
            });
        }

        $menuItem = $menuItem->paginate(10)
                        ->withQueryString();

        return view('business_section.index', compact('menuItem', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business_section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sectionData = $request->all();
        $sectionData['user_id'] = Auth::id();

        MenuSection::create($sectionData);

        return redirect()->route('menu_section.index')->with('message', 'Sections created successfully');
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
        //
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
        //
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
