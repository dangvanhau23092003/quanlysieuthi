<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\PersonnalController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SlideController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//login
// Route::get('/login',[PageController::class,'getLogin'])->name('getLogin');
// Route::post('/login',[PageController::class,'postLogin'])->name('postLogin');

Route::post('logout',[PageController::class,'getLogout'])->name('getLogout');

//index
Route::get('/',[PageController::class,'index'])->name('index');
//product
Route::get('/product/{id}',[PageController::class,'product'])->name('product');

//product_type
Route::get('/product_type/{id}',[ProductTypeController::class,'product_type'])->name('product_type');
//cart
Route::get('/cart',[PageController::class,'cart'])->name('cart');
//add-cart
Route::get('/add-cart/{id}',[PageController::class,'addCart'])->name('addCart');
Route::get('/delete-cart/{id}',[PageController::class, 'delCartItem'])->name('delCartItem');
//search
Route::get('/search',[PageController::class, 'postSearchProduct'])->name('postSearchProduct');
//checkout
// Route::get('/checkout',[PageController::class,'checkout'])->name('checkout');
Route::get('/checkout',[PageController::class,'getCheckout'])->name('getCheckout');
Route::post('/checkout',[PageController::class,'postCheckout'])->name('postCheckout');
//admin/favorite
Route::get('/favorite',[FavoriteController::class, 'getFavorite'])->name('getFavorite');
Route::get('/favorite/{id}',[FavoriteController::class, 'addFavorite'])->name('addFavorite');
Route::delete('/favorite/{id}', [FavoriteController::class, 'delFavorite'])->name('delFavorite');

//EMAIL
Route::get('/email',[MailController::class,'getEmail'])->name('getEmail');
Route::post('/email',[MailController::class,'postinputEmail'])->name('postinputEmail');

//contact
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'postContact'])->name('postContact');

//ADMIN

//signup
Route::get('/signup',[PageController::class,'getSignin'])->name('getsignin');
Route::post('/signup',[PageController::class,'postSignin'])->name('postsignin');

Route::get('login',[PageController::class,'login']);

Route::get('/login',[UserController::class,'getLogin'])->name('admin.getLogin');
Route::post('/login',[UserController::class,'postLogin'])->name('admin.postLogin');


Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::group(['prefix'=>''],function(){
        
    //dashboard
    Route::get('dashboard', [UserController::class,'dashboard'])->name('admin.dashboard');

    //banner
    Route::get('/slide',[SlideController::class,'getSlide'])->name('admin.getSlide');
    //admin/category/slide
    Route::get('/slide-add',  [SlideController::class,'getSlideAdd'])->name('admin.slide-add');
    Route::post('/slide-add', [SlideController::class,'postSlideAdd'])->name('admin.slide-add.postSlideAdd');
    Route::get('/slide-edit/{id}', [SlideController::class,'getSlideEdit'])->name('admin.slide-edit');
    Route::put('/slide-edit/{id}',[SlideController::class,'putSlideEdit'])->name('admin.slide-edit.putSlideEdit');
    Route::delete('/slide-delete/{id}',[SlideController::class,'delSlide'])->name('admin.delSlide');

    //admin/user
    Route::get('user', [UserController::class,'getUser'])->name('admin.getUser');
    //cap nhat user
    Route::get('user-edit/{id}', [UserController::class,'getUserEdit'])->name('admin.user-edit');
    Route::put('user-edit/{id}',[UserController::class,'putUserEdit'])->name('admin.user-edit.putUserEdit');
    //xoa user
    Route::delete('/user-delete/{id}',[UserController::class,'delUser'])->name('admin.delUser');

    //admin/customer
    Route::get('customer', [CustomerController::class,'getCustomer'])->name('admin.getCustomer');
    //admin/customer-edit
    Route::get('/customer-edit/{id}', [CustomerController::class,'getCustomerEdit'])->name('admin.customer-edit');
    Route::put('/customer-edit/{id}',[CustomerController::class,'putCustomerEdit'])->name('admin.customer-edit.putCustomerEdit');
    //admin/customer-delete
    Route::delete('/customer-delete/{id}',[CustomerController::class,'delCustomer'])->name('admin.delCustomer');
    

    //admin/personnal
    Route::get('personnal', [PersonnalController::class,'getPersonnal'])->name('admin.getPersonnal');
    //admin/personnal-add
    Route::get('/personnal-add', [PersonnalController::class,'getPersonnalAdd'])->name('admin.personnal-add');
    Route::post('/personnal-add', [PersonnalController::class,'postPersonnalAdd'])->name('admin.personnal-add.postPersonnalAdd');
    //admin/personnal-edit
    Route::get('/personnal-edit/{id}', [PersonnalController::class,'getPersonnalEdit'])->name('admin.personnal-edit');
    Route::put('/personnal-edit/{id}',[PersonnalController::class,'putPersonnalEdit'])->name('admin.personnal-edit.putPersonnalEdit');
    //delete personnal
    Route::delete('/personnal-delete/{id}',[PersonnalController::class,'delPersonnal'])->name('admin.delPersonnal');

    //admin/product
    Route::get('product', [ProductController::class,'getProduct'])->name('admin.getProduct');
    //admin/product-add
    Route::get('/product-add', [ProductController::class,'getProductAdd'])->name('admin.product-add');
    Route::post('/product-add', [ProductController::class,'postProductAdd'])->name('admin.product-add.postProductAdd');
    //admin/product-edit
    Route::get('/product-edit/{id}', [ProductController::class,'getProductEdit'])->name('admin.product-edit');
    Route::put('/product-edit/{id}', [ProductController::class,'putProductEdit'])->name('admin.product-edit.putProductEdit');
    //admin/product-delete
    Route::delete('/product-delete/{id}', [ProductController::class,'deleteProduct'])->name('admin.deleteProduct');

    //admin/product-type
    Route::get('product-type', [ProductTypeController::class,'getProductType'])->name('admin.getProductType');
    //admin/product-type-add
    Route::get('/product-type-add', [ProductTypeController::class,'getProductTypeAdd'])->name('admin.product-type-add');
    Route::post('/product-type-add', [ProductTypeController::class,'postProductTypeAdd'])->name('admin.product-type-add.postProductTypeAdd');
    //admin/product-type-edit
    Route::get('/product-type-edit/{id}', [ProductTypeController::class,'getProductTypeEdit'])->name('admin.product-type-edit');
    Route::put('/product-type-edit/{id}',[ProductTypeController::class,'putProductTypeEdit'])->name('admin.product-type-edit.putProductTypeEdit');
    //delete 
    Route::delete('/product-type-delete/{id}',[ProductTypeController::class,'delProductType'])->name('admin.delProductType');

    //admin/search-category
    Route::post('/search-category',[ProductTypeController::class,'postSearch'])->name('admin.postSearch');
    //admin/bill
    Route::get('/bill',[UserController::class,'getBill'])->name('admin.getBill');;
    Route::put('/bill/{id}',[UserController::class,'updateBill'])->name('admin.updateBill');

    //admin/contact
    Route::get('/contact',[ContactController::class,'getContact'])->name('admin.getContact');
    Route::put('/contact/{id}',[ContactController::class,'updateContact'])->name('admin.updateContact');
    Route::delete('/contact/{id}',[ContactController::class,'deleteContact'])->name('admin.deleteContact');
    });
});