<?php

namespace App\Providers;

use App\Models\Business;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

use App\Models\Category;
use App\Models\MenuSection;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cat = "";

        View::composer('*', function ($view) use ($cat) {
            if (Auth::check()) {
                $business = Business::where('user_id', Auth::user()->id)->first();
                $view->with('business', $business);


                $menuSections = MenuSection::where('user_id', Auth::user()->id)->get();
                $menuSectionArr = MenuSection::where('user_id', Auth::user()->id)->pluck('section_title','id')->toArray();
                $view->with('menuSections', $menuSections);
                $view->with('menuSectionArr', $menuSectionArr);
            }
        });

        Paginator::useBootstrap();
    }
}
