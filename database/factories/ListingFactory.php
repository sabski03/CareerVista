<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Company as CompanyProvider;
use Illuminate\Support\Facades\Storage;

class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new CompanyProvider($this->faker));

        // Generate a unique file name for the logo
        $logoFileName = $this->faker->unique()->word() . '.png';

        // Generate a fake image file and store it in the 'logos' directory
        Storage::disk('public')->put('logos/' . $logoFileName, file_get_contents($this->faker->imageUrl(200, 200)));

        return [
            'title' => $this->faker->sentence(),
            'tags' => 'laravel, api, backend',
            'company' => $this->faker->company(),
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraph(5),
            'logo' => 'logos/' . $logoFileName,
        ];
    }
}

