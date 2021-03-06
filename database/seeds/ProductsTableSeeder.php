<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();
        */

        $categorias = factory(Category::class, 4)->create();
        $categorias->each(function ($c){
            $products= factory(Product::class, 5)->make();
            $c->products()->saveMany($products);

            $products->each(function ($p){
                $imagenes = factory(ProductImage::class, 3)->make();
                $p->images()->saveMany($imagenes);
            });
        });

        /*$users = factory(App\User::class, 3)
           ->create()
           ->each(function ($u) {
                $u->posts()->save(factory(App\Post::class)->make());
            });*/
    }
}
