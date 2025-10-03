<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class SubcategoryController extends Controller
{
    // GET Sub category based on category ID
    public function getSubcategories($categoryId)
    {
        $subcategories = Category::where('parent_id', $categoryId)->get();
        return response()->json($subcategories);
    }
}
