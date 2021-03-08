<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('categories', 'subCategories', 'tags');
        $searchParam = key((array)$request->filter);
        $searchValue = current((array)$request->filter);

        switch ($searchParam) {
            case 'byName':
            case 'byDescription':
            case 'byCategory':
            case 'bySubCategory':
            case 'byTags':
                return  $products = $products->search($searchValue)->get();
                break;
            default:
                return $products;
                break;
        }
        return response()->json(['success' => true, 'products' => $products]);
    }
}
