<?php

use App\Http\Controllers\BbsController;
use App\Models\Bbs;
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

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('top');
});

Route::get('/top', [BbsController::class, 'top'])->name('top');
Route::post('/top', [BbsController::class, 'posts'])->name('top.posts');

// 各投稿から編集ボタン、削除ボタンを押したときのルーティング
Route::get('/{post_id}/eest', [BbsController::class, 'editEdit'])->name('edit.edit');
Route::get('/{post_id}/edit', [BbsController::class, 'DeleteModal'])->name('edit.delete');
Route::get('/{post_id}/destroy', [BbsController::class, 'doDestroy']);
Route::delete('/{post_id}/destroy', [BbsController::class, 'doDestroy'])->name('confirm-destroy');



// testpage
Route::get('/test', function () {
    return view('/bbs.test');
})->name('test');

Route::get('/test2', function () {
    return redirect()->route('test3');
})->name('test.top');

Route::get('/test3', function() {
    return view('/bbs.test');
})->name('test3');

Route::post('/test',[BbsController::class, 'modalTest'])->name('test.modal');

Route::get('/pretest', function() {
    return view('/bbs.pretest');
});

