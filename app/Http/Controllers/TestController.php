<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    public function welcome()
    {
    	
    	$products = Product::paginate(20);
    	/*$varA=5;
    	$varB=7;

    	$data=[];
    	$data['prodcuts'];
    	$data['varA'];
    	$data['varB'];

    	return view('welcome')->with($data);
    	Todo esto se evita con compact que lo hace por nosotros en
    	caso de necesitarlo*/
    	return view('welcome')->with(compact('products'));
    }
}
