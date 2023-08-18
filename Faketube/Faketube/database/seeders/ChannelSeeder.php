<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Channel;
class ChannelSeeder extends Seeder
{
 
    public function run(): void
    {
        $faker = Faker::create();

        // Generate fake users
        for ($i = 0; $i < 50; $i++) {
            channel::create([
                'ChannelName' => $faker->name,
                'Description' => $faker->text,
                'SubscribersCount' => $faker->numberBetween(1000, 10000),
                'URL' => $faker->URL,
            ]);
        }
    }
}
