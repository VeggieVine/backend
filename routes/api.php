<?php

use App\Models\Carts;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

    // PRODUCTS
    Route::prefix('products')->group(function ()
    {
        Route::post('/', function (Request $request)
        {
            // VALIDATE REQUEST
            $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'price' => 'required|integer|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'required|string'
            ]);

            // CREATE PRODUCT
            Products::query()->create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'harvested_from' => 'Jakarta',
                'category_id' => $request->category_id,
                'price' => $request->price,
                'stock' => $request->stock,
                'image' => $request->image,
                'storage_life' => 7,
                'harvested_at' => Carbon::now(),
            ]);

            return response()->json([
                'message' => 'Berhasil menambahkan produk baru.'
            ], 201);
        });

        Route::put('/{id}', function (Request $request, $id)
        {
            // VALIDATE REQUEST
            $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'price' => 'required|integer|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'required|string'
            ]);

            // FIND PRODUCT
            $product = Products::query()->find($id);

            // UPDATE PRODUCT
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'stock' => $request->stock,
                'image' => $request->image,
            ]);

            return response()->json([
                'message' => 'Berhasil mengubah data produk.'
            ]);
        });

        Route::delete('/{id}', function ($id)
        {
            // FIND PRODUCT
            $product = Products::query()->find($id);

            // DELETE PRODUCT
            $product->delete();

            return response()->json([
                'message' => 'Berhasil menghapus produk.'
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
