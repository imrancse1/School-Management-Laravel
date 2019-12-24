<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Auth;
use App\HeaderFooter;
use DB;

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
        View::composer('admin.includes.header', function($view){
            $user = Auth::user();
            $header = DB::table('header_footers')->first();
            $view->with([
                'user'=>$user,
                'header'=>$header,
            ]);
        });

        // View::composer('admin.includes.header', function($view){
        //     $header = HeaderFooter::find(1);
        //     $view->with('header',$header);
        // });

        View::composer('admin.includes.footer', function($view){
            $footer = HeaderFooter::find(1);
            $view->with('footer',$footer);
        });
    }
}
