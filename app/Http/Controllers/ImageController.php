<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;


class ImageController extends Controller
{
     public function index($id)
    {
        $product = Product::find($id);
        $images = $product->images;
    	return view('admin.products.images.index')->with(compact('product', 'images'));
    }

     public function store()
    {
        $products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));
    }

     public function destroy()
    {
        $products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));
    }
}
