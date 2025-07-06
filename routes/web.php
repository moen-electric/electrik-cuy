<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TransaksiAdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TransactionController;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(Auth::user()) {
        $user= Cart::where('user_id', Auth::id())->latest()->get();
    } else {
        $user= Cart::get();
    }
     $products = Product::latest()->take(8)->get();
    // return $user;
    return view('index', [
        'carts' => $user,
        'products' => $products,
        'categories' => Category::get()
    ]);
});

Route::get('/sale', [SaleController::class, 'index'])->name('sale');
Route::get('/sale/{product}', [SaleController::class, 'detail'])->name('sale.detail');



Route::get('/detail-product/{id}', [ProductController::class, 'detail'])->name('detail-product');

// Route view Purchases
Route::get('/purchases', function() {
    // return $shoes;
    return view('purchases', [
        'transactions' =>  Transaction::where('user_id', Auth::user()->id)->latest()->get(),
        'categories' => Category::get()
    ]);
});

Route::get('/contactus', function() {
    return view('contactus', [
        'categories' => Category::get()
    ]);
});

Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
Route::post('/login', [AuthenticationController::class, 'authenticate']);
Route::post('/register', [AuthenticationController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);

    // Route view dashboard admin
    Route::get('/dashboard', function () {
        // Cek role user, hanya admin (role == 1) yang boleh lanjut
        if (Auth::user()->role != 1) {
            abort(403, 'Unauthorized access');
        }

        return view('admin.index', [
            'active' => 'dashboard',
            'customers' => User::where('role', '2')->latest()->get(),
            'category' => Category::latest()->get(),
            'product' => Product::latest()->get(),
            'transaction' => Transaction::latest()->get()
        ]);
    });

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::resource('category', CategoryController::class);

    Route::resource('brand', BrandController::class);

    Route::resource('product', ProductController::class);

    Route::get('/transaction', [TransaksiAdminController::class, 'index']);
    // Route Konfirmasi Pesanan
    Route::post('/transaction/{transaction:id}/confirm', [TransaksiAdminController::class, 'confirm']);
    // Route send Pesanan
    Route::post('/transaction/{transaction:id}/send', [TransaksiAdminController::class, 'send']);
    // Route Delete Pesanan
    Route::post('transaction/{transaction:id}', [TransaksiAdminController::class, 'delete']);
     // Route view update profile
    Route::get('/profile/{user:id}', [ProfileController::class, 'index'])->name('profile');
    // Route proses edit profile
    Route::post('/profile/{user:id}/edit', [ProfileController::class, 'updateProfile']);
     // Route view deatil transaksi
    Route::get('/transaction/{cart:id}', [TransactionController::class, 'index']);
    // Route proses transaksi
    Route::post('/bayar/{cart:id}', [TransactionController::class, 'store']);

    Route::get('/review/{transaction:id}', [ReviewController::class, 'index']);
    Route::post('/review/{transaction:id}', [ReviewController::class, 'store']);

});
