<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

use App\Models\Type_product;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['layouts.header','header', 'cart', 'checkout'],function($view) {
            if(Session('cart')){
                $oldCart=Session::get('cart'); //session cart được tạo trong method addToCart của PageController
                $cart=new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'productCarts'=>$cart->items,
                'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }

            $loai_sp = Type_product::all();
            $view->with('loai_sp',$loai_sp);
        });
    }
}
