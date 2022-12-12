<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() {

        $products = DB::table("products")
            ->join("categories", "products.category_id", "=", "categories.id")
            ->select(
                "categories.name as categoryName",
                "products.name as productName",
                "products.id as productId")
            ->get();


        return response()->json([
            "success" => true,
            "data" => $products
        ], 200);
    }

    public function store(Request $request) {
        $data = $request->only(['name', 'price', 'description', 'qt', 'category_id']);

        $store = Product::create($data);
        if($store) {
            return response()->json([
                "success" => true,
                "message" => "Product {$store->name} successfully created!"
            ], 200);
        }
    }

    public function show($id) {
        $product = DB::table("products")
            ->join("categories", "products.category_id", "=", "categories.id")
            ->select(
                "categories.name as categoryName",
                "products.name as productName",
                "products.id as productId",
                "products.price as price",
                "products.description as description",
                "products.qt as qt")
            ->where("products.id", "=", $id)
            ->get();
        if(!empty($product)) {
            return response()->json([
                "success" => true,
                "data" => $product
            ], 200);
        } else {
            return response()->json([
                "success" => false,
                "data" => 'Category not found'
            ], 200);
        }
    }

}
