<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Price;
use App\Models\PriceDetail;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::with('prices.priceDetails')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:150',
            'product_category' => 'required|in:Rokok,Obat,Lainnya',
            'description' => 'nullable|max:255',
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:150',
            'product_category' => 'required|in:Rokok,Obat,Lainnya',
            'description' => 'nullable|max:255',
        ]);

        $product->update($validated);
        return response()->json($product);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }

    public function search(Request $request)
    {
        $query = Product::with(['prices.priceDetails']);

        if ($request->has('name')) {
            $query->where('name', 'like', "%{$request->name}%");
        }

        if ($request->has('product_category')) {
            $query->where('product_category', $request->product_category);
        }

        $products = $query->get()->filter(function ($product) use ($request) {
            if ($request->has('tier')) {
                $filteredPrices = $product->prices->map(function ($price) use ($request) {
                    $price->priceDetails = $price->priceDetails->where('tier', $request->tier)->values();
                    return $price->priceDetails->isNotEmpty() ? $price : null;
                })->filter();

                $product->prices = $filteredPrices->values();
                return $filteredPrices->isNotEmpty();
            }

            return true;
        });

        return response()->json($products->values());
    }

}
