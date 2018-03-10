<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function product()
    {
    	return $this->belongsTO(Product::class);
    }


    //accesor con nombre "url" en las variables de vista
    public function getUrlAttribute(){
    	if(substr($this->image,0,4)=="http"){
    		return $this->image;
    	}

    	return '/images/products/'.$this->image;
    }
}
