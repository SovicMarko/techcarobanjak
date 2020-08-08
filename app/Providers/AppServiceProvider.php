<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Kategorija;
use Gate;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
        //
        Schema::defaultStringLength(191);

        // $this->registerPolicies();

        Gate::define('admin_only',function($user)
        {
           if($user->is_admin == 1) {
               return true;
           }
           else return false;
        });


        view()->composer('inc.navbar', function ($view)
        {
            $userRole = FacadesAuth::user();
            $admin = false;
            if ($userRole != null && $userRole->is_admin === 1) {
                $admin = true;
            }

            $view->with('kategorije', [ "kategorije" => Kategorija::get()])->with('admin', $admin);
        });

        view()->composer('inc.dashboard', function ($view)
        {
            $broj_objava = DB::table('posts')->count();
            $broj_korisnika = DB::table('users')->count();

            $view->with('broj_objava', $broj_objava)
                 ->with('broj_korisnika', $broj_korisnika);
        });

        view()->composer('inc.kategorijePrikazOpisa', function ($view)
        {
            $kategorije = DB::table('kategorijas')->take(4)->get();

            $view->with('kategorije', $kategorije);
        });
    }
}
