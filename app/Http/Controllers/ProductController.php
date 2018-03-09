<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));
    }

     public function create()
    {
    	return view('admin.products.create');
    }

     public function store(Request $request)
    {

     $messages=[
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre tiene que tener un minimo de 3 caracteres',
            'description.required' => 'Es necesario agregar una descripción',
            'description.max' => 'La descripción tiene que tener un máximo de 200 caracteres',
            'price.required' => 'Es necesario agregar un precio al producto'
        ];
        $rules=[
            'name'=>'required|min:3',
            'description'=>'required|max:200',
            'price'=>'required|numeric|min:0',
        ];

        $this->validate($request, $rules, $messages);
     
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price= $request->input('price');
        $product->long_text= $request->input('long_text');
        if($product->save()){
            return  redirect('/admin/products');
        }else{
            return 'error';
        }

        
    }


     public function edit(Request $request, $id)
    {

        $product= Product::find($id);
        return response()->json( $product);
    }

     public function update(Request $request)
    {
        $messages=[
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre tiene que tener un minimo de 3 caracteres',
            'description.required' => 'Es necesario agregar una descripción',
            'description.max' => 'La descripción tiene que tener un máximo de 200 caracteres',
            'price.required' => 'Es necesario agregar un precio al producto'
        ];
        $rules=[
            'name'=>'required|min:3',
            'description'=>'required|max:200',
            'price'=>'required|numeric|min:0',
        ];

         $validator = Validator::make($request->all(), $rules,$messages);
  
         if (!$validator->fails()) {


        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price= $request->price;
        $product->long_text= $request->long_text;
            if($product->save()){
                return response()->json(['data'=>"hecho"]);           
            }else{
                return response()->json(['data'=>"Algo Salio mal"]);
            }
        }
        return response()->json(['errors'=> $validator->messages()]);
        
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $Images= ProductImage::where('product_id', $id);    

        $Images->delete();
        if($product->delete()){
            return  back();
        }else{
            return 'error';
        }

        
    }

     public function prueba(Request $request)
    {
        dd($request->all());
        $name= $request->name;
        
        return response()->json($name);
    }


//metodo sobre escrito como prueba
    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            return response()->json(['data'=>'nada']);
        }
    }

    

}
