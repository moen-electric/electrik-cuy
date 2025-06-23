<?php

use App\Http\Controllers\CartsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TransactionAdminController;
use App\Http\Controllers\TransactionController;
use App\Models\Carts;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Reviews;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function() {
    if(Auth::user()) {
        $user= Carts::where('id_user', Auth::user()->id)->latest()->get();
    } else {
        $user= Carts::get();
    }
    return view('user.home.index', [
     'products' => Products::latest()->paginate(6)->withQueryString(),
     'productes' => Products::all(),
     'reviews' => Reviews::latest()->paginate(3),
     'categories' => Categories::all(),
     'users' => User::where('role', '2')->get(),
     'carts' => $user,
     'transaction' => Transactions::where('status', 'rate it')->orwhere('status', 'send')->get()
    ]);
});

// Route view sale
Route::get('/sale', [SaleController::class, 'index']);
// route view Detail product
Route::get('/detailproduct/{product:id}', [SaleController::class, 'detail']);

// Route view Purchases
Route::get('/purchases', function() {
    // return $product;
    return view('user.purchases.index', [
        'transactions' =>  Transactions::where('user_id', Auth::user()->id)->latest()->get(),
        'reviews' => Reviews::where('product_id', )->get()
    ]);
});

// Route Contatc us
Route::get('/contactus', function() {
    return view('user.contactus.index');
});

// Middleware Guest
Route::middleware(['guest'])->group(function () {
    // route view login
    Route::get('/login', function () {
        return view('login.index');
    })->name('login');

    // Route proses regiatrasi
    Route::post('/register', [LoginController::class, 'register']);

    // Route proses login
    Route::post('/login', [LoginController::class, 'authenticate']);

});

// middleware Auth
Route::middleware(['auth'])->group(function () {
    // Route proses logout
    Route::post('/logout', [LoginController::class, 'logout']);

    // Admin
    // Route view dashboard admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index', [
            'active' => 'dashboard',
            'customers' => User::where('role', '2')->latest()->get(),
            'category' => Categories::latest()->get(),
            'product' => Products::latest()->get(),
            'transaction' => Transactions::latest()->get()
        ]);
    });

    // Route view, create, update, delete Category
    Route::resource('category', CategoriesController::class);

    // Route view product
    Route::resource('product', ProductsController::class);
    // Route detail sepatu dashboard admin
    Route::get('/product/{product:id}/view', [ProductsController::class, 'view']);
    // Route edit sepatu
    Route::get('/product/edit/{product:id}', [ProductsController::class, 'edit']);
    // Route update sepatu
    Route::post('/product/{product:id}/update', [ProductsController::class, 'update']);
    // Route delete sepatu
    Route::post('/product/{product:id}/delete', [ProductsController::class, 'delete']);

    // Route view Transaction
    Route::get('/transaction', [TransactionAdminController::class, 'index']);
    // Route Konfirmasi Pesanan
    Route::post('/transaction/{transaction:id}/confirm', [TransactionAdminController::class, 'confirm']);
    // Route send Pesanan
    Route::post('/transaction/{transaction:id}/send', [TransactionAdminController::class, 'send']);
    // Route Delete Pesanan
    Route::post('transaction/{transaction:id}', [TransactionAdminController::class, 'delete']);
    // Route Review User
    Route::get('/review/{transaction:id}', [TransactionController::class, 'review']);
    Route::post('/review/{transaction:id}', [TransactionController::class, 'reviewpost']);


    // User
    // Route view update profile
    Route::get('/profile/{user:id}', [ProfileController::class, 'index'])->name('profile');
    // Route proses edit profile
    Route::post('/profile/{user:id}/edit', [ProfileController::class, 'updateProfile']);
    // Route proses Create Cart
    Route::post('/cart', [CartsController::class, 'cart']);
    // Route proses delete Cart
    Route::post('/cart/{cart:id}/delete', [CartsController::class, 'deleteCart']);

    // Route view deatil transaksi
    Route::get('/transaction/{cart:id}', [TransactionController::class, 'index']);
    // Route proses transaksi
    Route::post('/bayar/{cart:id}', [TransactionController::class, 'store']);

    // Route contact us admin
    Route::get('/contact_us', [ContactUsController::class, 'view']);
});