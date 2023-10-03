<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Factories\ProductFactory; 
class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateAndRetrieveProduct()
    {
        /**
        * Implemented Database Test
        */

        //Product created
        $product = ProductFactory::new()->create();

        //Created product is retrieved from the database
        $retrievedProduct = \DB::table('products')->find($product->id);

        //Product Created
        $this->assertNotNull($retrievedProduct);

        $this->assertEquals($product->name, $retrievedProduct->name);
    }
}