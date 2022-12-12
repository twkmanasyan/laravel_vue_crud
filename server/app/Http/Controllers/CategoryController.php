<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
//        $categories = Category::all();
//        foreach ($categories as $category) {
//            echo "<div>";
//                echo "<p>{$category->name}</p>";
//                if(count($category->products) > 0) {
//                    echo "<ol>";
//                        foreach ($category->products as $product) {
//                            echo "<li>{$product->name}</li>";
//                        }
//                    echo "</ol>";
//                }
//            echo "</div>";
//        }
//
//        return;

        return response()->json([
            "success" => true,
            "data" => Category::all()
        ], 200);
    }

    public function show($id) {
        $category = Category::find($id);
        if(!empty($category)) {
            return response()->json([
                "success" => true,
                "data" => $category
            ], 200);
        } else {
            return response()->json([
                "success" => false,
                "data" => 'Category not found'
            ], 200);
        }

    }

    public function store(Request $request) {
        $data = $request->only(['name', 'notes']);
//        return $data;
        $store = Category::create($data);
        if($store) {
            return response()->json([
                "success" => true,
                "message" => "Category {$store->name} successfully created!"
            ], 200);
        }
    }

    public function edit($id) {
        $category = Category::find($id);
        if(!empty($category)) {
            return response()->json([
                "success" => true,
                "data" => $category
            ], 200);
        } else {
            return response()->json([
                "success" => false,
                "message" => 'Category not found'
            ], 200);
        }
    }

    public function update(Request $request) {
//        return $request;
        $category = Category::find($request->id);
        if($category) {
            $category->update($request->only(['name', 'notes']));
            return response()->json([
                "success" => true,
                "message" => "{$category->name} successfully updated"
            ], 200);
        } else {
            return response()->json([
                "success" => false,
                "message" => 'Category not found'
            ], 200);
        }
    }

    public function delete($id) {
        $category = Category::find($id);
        if(!empty($category)) {
            $category->delete();
            return response()->json([
                "success" => true,
                "message" => "{$category->name} successfully updated"
            ], 200);
        } else {
            return response()->json([
                "success" => false,
                "message" => 'Category not found'
            ], 200);
        }
    }
}
