<?php

namespace Database\Factories;

use App\Models\Banner;
use BaconQrCode\Renderer\Path\Path;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

class BannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Banner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'title' => $this->faker->text($maxNbChars = 18),
            'image' => 'banners/Biggie_Express.svg',
            'order' => $this->faker->randomNumber(),
            'status' => $this->faker->boolean(),
            'category_id' => $this->faker->numberBetween(1, 3),
            'timeRefresh' => 5,

        ];
    }
}
