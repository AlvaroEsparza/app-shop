<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;


class ImageController extends Controller
{
     public function index($id)
    {
        $product = Product::find($id);
        $images = $product->images;
    	return view('admin.products.images.index')->with(compact('product', 'images'));
    }

     public function store(Request $request)
    {
    	//guardar imagen en el servidor
        $file = $request->file('photo');
        $path = public_path(). '/images/products';
        $fileName = uniqid(). str_replace(" ","_",$file->getClientOriginalName());
        $moved = $file->move($path, $fileName);

        //agregar imagen a la base de datos (tabla produc_image)
        if($moved){
	        $productImage = new ProductImage();
	        $productImage->image=$fileName;
	        //$product->feature=; no es necesario ya que por defecto es false
	        $productImage->product_id = $id;
	        $productImage->save();
    	}
        return back();

    }

     public function destroy(Request $request)
    {
        //elminar archivo
        $productImage = ProductImage::find($request->input('image_id'));
        if(substr($productImage->image,0,4) == "http"){
    		$deleted = true;
    	}else{
    		$fullPath = public_path()."/images/products/".$productImage->image;
    		$deleted = File::delete($fullPath);
    	}

    	if($deleted){
    		$productImage->delete();
    	}

    	return back();
    }
}
