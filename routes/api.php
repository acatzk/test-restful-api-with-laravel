<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Buyer\BuyerTransactionController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Transaction\TransactionCategoryController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Transaction\TransactionSellerController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
 *
 * Buyers 
 * 
 */
Route::resource('buyers', BuyerController::class, ['only' => ['index', 'show']]);
/*
 * Buyers & Transactions
 */
Route::resource('buyers.transactions', BuyerTransactionController::class, ['only' => ['index']]);



/*
 *
 * Categories 
 * 
 */
Route::resource('categories', CategoryController::class, ['except' => ['create', 'edit']]);


/*
 *
 * Products 
 * 
 */
Route::resource('products', ProductController::class, ['only' => ['index', 'show']]);


/*
 *
 * Sellers 
 * 
 */
Route::resource('sellers', SellerController::class, ['only' => ['index', 'show']]);


/*
 *
 * Transactions 
 * 
 */
Route::resource('transactions', TransactionController::class, ['only' => ['index', 'show']]);
/*
 * Transactions & Categories
 */
Route::resource('transactions.categories', TransactionCategoryController::class, ['only' => ['index']]);
/*
 * Transactions & Sellers
 */
Route::resource('transactions.sellers', TransactionSellerController::class, ['only' => ['index']]);

/*
 *
 * Users 
 * 
 */
Route::resource('users', UserController::class, ['except' => ['store', 'create', 'edit']]);


/*
 *
 * Auththentication
 * 
 */
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
