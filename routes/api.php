<?php

use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::get('/users', function () {
        foreach(User::query()->get() as $item)
        {
            return Carbon::parse(($item["updated_at"]), 'UTC')->isoFormat('dddd, D MMMM Y, HH:mm:ss');
        }
    });
});

Route::get('/products', function () {
    return response()->json([
        'products' => Products::query()->with('category')->get()
    ]);
});
