<?php

use App\Models\Carts;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function ()
{
    Route::get('/user', function (Request $request)
    {
        return $request->user();
    });

    Route::get('/users', function ()
    {
        foreach (User::query()->get() as $item)
        {
            return Carbon::parse(($item["updated_at"]), 'UTC')->isoFormat('dddd, D MMMM Y, HH:mm:ss');
        }
    });

    // CARTS
    Route::prefix('carts')->group(function ()
    {
        Route::get('/', function (Request $request)
        {
            return response()->json([
                'carts' => Carts::query()->where('customer_id', $request->user()->id)->with('product')->get()
            ]);
        });

        Route::post('/', function (Request $request)
        {
            // VALIDATE REQUEST
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1'
            ]);

            // FIND PRODUCT
            $product = Products::query()->find($request->product_id);

            // REDUCE STOCK
            $product->decrement('stock', $request->quantity);

            // FIND CART
            $cart = Carts::query()->where('customer_id', $request->user()->id)->where('product_id', $product->id)->first();

            // IF CART IS NOT EMPTY
            if ($cart)
            {
                // UPDATE CART
                $cart->increment('quantity', $request->quantity);
            }
            else
            {
                // CREATE CART
                $cart = Carts::query()->create([
                    'customer_id' => $request->user()->id,
                    'product_id' => $product->id,
                    'quantity' => $request->quantity,
                ]);
            }

            return response()->json([
                'message' => 'Berhasil menambahkan item ke keranjang.'
            ], 201);
        });

        Route::delete('/{id}', function (Request $request, $id)
        {
            // FIND CART
            $cart = Carts::query()->where('customer_id', $request->user()->id)->find($id);

            // FIND PRODUCT
            $product = Products::query()->find($cart->product_id);

            // INCREASE STOCK
            $product->increment('stock', $cart->quantity);

            // DELETE CART
            $cart->delete();

            return response()->json([
                'message' => 'Berhasil menghapus item dari keranjang.'
            ]);
        });
    });
});

Route::get('/products', function ()
{
    return response()->json([
        'products' => Products::query()->with('category')->get()
    ]);
});

Route::get('/product/{id}', function ($id)
{
    return response()->json([
        'product' => Products::query()->with('category')->find($id)
    ]);
});
