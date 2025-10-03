<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Post;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $users = User::where('status', '!=', 2)->get();
        $usersCount = $users->count();

        return view('admin.dashboard', compact(['usersCount']));
    }
}