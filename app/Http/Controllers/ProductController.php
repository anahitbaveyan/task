<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function getAllProducts(Request $request)
{
    $limit = $request->query('limit', 30);  
    $skip = $request->query('skip', 0);     

    $response = Http::get("https://dummyjson.com/products", [
        'limit' => $limit,
        'skip' => $skip,
    ]);

    return response()->json($response->json());
}

public function getProduct($id)
{
    $response = Http::get("https://dummyjson.com/products/{$id}");
    return response()->json($response->json());
}


public function searchProducts(Request $request)
{
    $query = $request->query('q');
    
    $response = Http::get("https://dummyjson.com/products/search", [
        'q' => $query,
    ]);

    return response()->json($response->json());
}

public function getLimitedProducts(Request $request)
{
    $limit = $request->query('limit', 10);  
    $skip = $request->query('skip', 0);     
    $select = $request->query('select');    

    $response = Http::get("https://dummyjson.com/products", [
        'limit' => $limit,
        'skip' => $skip,
        'select' => $select,
    ]);

    return response()->json($response->json());
}


public function sortProducts(Request $request)
{
    $sortBy = $request->query('sortBy', 'title');
    $order = $request->query('order', 'asc');

    $response = Http::get("https://dummyjson.com/products", [
        'sortBy' => $sortBy,
        'order' => $order,
    ]);

    return response()->json($response->json());
}

public function getCategories()
{
    $response = Http::get("https://dummyjson.com/products/categories");
    return response()->json($response->json());
}

public function getProductsByCategory($category)
{
    $response = Http::get("https://dummyjson.com/products/category/{$category}");
    return response()->json($response->json());
}

public function addProduct(Request $request)
{
    $response = Http::post("https://dummyjson.com/products/add", $request->all());

    return response()->json($response->json());
}

public function updateProduct(Request $request, $id)
{
    $response = Http::put("https://dummyjson.com/products/{$id}", $request->all());

    return response()->json($response->json());
}

public function deleteProduct($id)
{
    $response = Http::delete("https://dummyjson.com/products/{$id}");

    return response()->json($response->json());
}



}
