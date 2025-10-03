<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;


class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $filter = $request->query('filter');

        $visitors = Visitor::select('*')->orderBy('id', 'desc');

        if(!empty($request->filter)){
            $searchFields = ['name'];
            //$searchFields = ['title','content','author_name','category_name'];
            $users->where(function($query) use($request, $searchFields){
                $searchWildcard = '%' . $request->filter . '%';
                foreach($searchFields as $field){
                $query->orWhere($field, 'LIKE', $searchWildcard);
                }
            });
        }

        $visitors = $visitors->with('business', 'business.rooms')->paginate(10)->withQueryString();

        return view('visitor.list', compact('visitors', 'filter'));
    }

}
