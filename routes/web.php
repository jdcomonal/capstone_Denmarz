<?php

use App\Http\Controllers\pizzaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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

// Route::get('/test-database', function () {
//     try {
//         DB::connection()->getPdo();
//         return "Database connection is successful!";
//     } catch (\Exception $e) {
//         return "Database connection failed: " . $e->getMessage();
//     }
// });



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','admin'])->name('dashboard');

Route::get('/orders', function () {
    return view('orders');
})->middleware(['auth', 'verified','admin'])->name('orders');

Route::get('/listPizza', [pizzaController::class, 'listPizza'])->middleware(['auth', 'verified','admin'])->name('products');
Route::post('/storepizza', [pizzaController::class, 'storePizza'])->middleware(['auth', 'verified','admin'])->name('pizza.store');
Route::post('/savepizza', [pizzaController::class, 'savePizza'])->middleware(['auth', 'verified','admin'])->name('pizza.save');
Route::get('/editpizza/{pizza}', [pizzaController::class, 'editPizza'])->middleware(['auth', 'verified','admin'])->name('pizza.edit');
Route::get('/removepizza/{pizza}', [pizzaController::class, 'removePizza'])->middleware(['auth', 'verified','admin'])->name('pizza.remove');
// ,'admin' to secure the dashbroad

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';