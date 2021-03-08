<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $req)
    {
        $products = Product::with('categories', 'subCategories', 'tags');

        $categories = Category::where('parent_id', '=', null)->get();
        $tags = Tag::all();

        if (request()->ajax()) {
            if ($req->has('search') && $req->search !== null && $req->search !== '') {
                $products = $products->search($req->get('search'));
            }
            if ($req->has('category') && $req->category !== 'all') {
                $products = $products->search($req->get('category'));
            }
            if ($req->has('subCategory') && $req->subCategory !== 'all') {
                $products = $products->search($req->get('subCategory'));
            }
            if ($req->has('tags') && $req->tags !== 'all') {
                $products = $products->search($req->get('tags'));
            }
            if ($req->tags == 'all' && $req->category == 'all' && $req->subCategory == 'all' && $req->search == '' && $req->search == null) {
                $products = Product::query()->get();
            }
            return datatables()->of($products)
                ->addColumn('image', 'partials.image')
                ->addColumn('category', function (Product $product) {
                    return $product->categories->name;
                })
                ->addColumn('subCategory', function (Product $product) {
                    return $product->subCategories->name;
                })
                ->addColumn('tags', function (Product $product) {
                    $btns = "";
                    foreach ($product->tags as $index => $tag) {
                        $btns .= "<button class='btn btn-sm btn-primary'>" . $tag->name . "</button>";
                    }
                    return $btns;
                })
                ->rawColumns(['image', 'category', 'subCategory', 'tags'])
                ->make(true);
        }
        return view('products', compact('categories', 'tags'));
    }

    function getSubCategories($id)
    {
        $subCategories = Category::where('parent_id', $id)->get();
        return $subCategories;
    }

    public function store(Request $req)
    {
        $product = new Product();
        $this->validate($req, [
            'name' => 'required',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required|numeric',
            'sub_category_id' => 'required|numeric',
            'tag_id' => 'required|array',
        ]);
        $attrs = $req->only(['name', 'desc', 'purchase_price', 'selling_price', 'stock', 'category_id', 'sub_category_id']);
        $tag_ids = $req->tag_id;
        $product = Product::create($attrs);
        if ($req->hasFile('image')) {
            $filename = $req->file('image')->store('public');
            $url = Storage::url($filename);

            $product->image = $filename;
            $product->image_path = $url;
            $product->save();
        }
        $product->tags()->attach($tag_ids);
        return back();
    }
}
