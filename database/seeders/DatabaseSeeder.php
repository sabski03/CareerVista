<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        \App\Models\User::factory(15)->create();
//
        $user = User::factory()->create([
            'name' => 'john',
            'email' => 'something@gmail.com',
        ]);



        Listing::factory(30)->create([
            'user_id' => $user->id
        ]);
//
//        Listing::create([
//            'title' => 'Laravel Senior Developer',
//            'tags' => 'laravel, javascript',
//            'company' => 'Acme Corp',
//            'location' => 'Boston, MA',
//            'email' => 'email1@email.com',
//            'website' => 'https://www.acme.com',
//            'description' => 'i have no idea',
//        ]);
//        Listing::create([
//            'title' => 'Full-Stack Developer',
//            'tags' => 'laravel, backend, api',
//            'company' => 'Stark Industries',
//            'location' => 'New York, NY',
//            'email' => 'email2@email.com',
//            'website' => 'https://www.starkindustries.com',
//            'description' => 'i have no idea 2',
//        ]);
    }
}
