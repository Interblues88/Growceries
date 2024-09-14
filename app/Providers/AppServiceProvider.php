<?php

namespace App\Providers;

use App\Models\cart;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    protected $policies = [
            
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
   
        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
           return $user->role == 'admin';
        });
       
        /* define a manager user role */
        Gate::define('isCourier', function($user) {
            return $user->role == 'manager';
        });
      
        /* define a user role */
        Gate::define('isUser', function($user) {
            return $user->role == 'user';
        });

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $userId = $user->id;
    
                // Ensure the user has a cart
                $cart = Cart::firstOrCreate(['userId' => $userId]);
    
                // Get the cart items
                $cartItems = $cart->cartList;
    
                // Count the cart items
                $count = $cartItems->count();
                $view->with('count', $count);
            }
        });
    }
}
