<?php

namespace Database\Factories;

use Faker\Provider\Image;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GuestHousesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $imagePath = public_path('images');
        $images = glob($imagePath . '/*.{jpg,png,gif}', GLOB_BRACE);
        $room_images = [];

        for($i = 0; $i < 5; $i++) {
            $room_images[$i] = $images ? str_replace($imagePath . '/', '', $this->faker->randomElement($images)) : null;
        }

        $room_images_string = implode(',', $room_images);


        return [
            'room_name' => $this->faker->company(),
            'room_details' => $this->faker->sentence(9),
            'room_price' => $this->faker->randomNumber(4, true),
            'room_location' => $this->faker->city(),
            'room_image' => $room_images_string
        ];
    }
}
