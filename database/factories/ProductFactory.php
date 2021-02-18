<?php

namespace Database\Factories;

use App\Models\Product;
use App\Providers\FakerServiceProvider;
use Bezhanov\Faker\ProviderCollectionHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        return [
            'name' => $faker->productName,
            'category' => $faker->department(1, true),
            'description' => $this->faker->sentence(20),
            'datetime'  => $this->faker->dateTime(),
        ];
    }
}
