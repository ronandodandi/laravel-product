<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::select(
            'ID',
            'NamaProduk',
            'Qty'
        )->get();

        return response()->json([
            'success' => true,
            'message' => 'Product inquiry successfully',
            'data' => $products,
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $product = Product::select(
            'ID',
            'NamaProduk',
            'Qty'
        )->find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product inquiry successfully',
            'data' => $product,
        ]);
    }//
}
