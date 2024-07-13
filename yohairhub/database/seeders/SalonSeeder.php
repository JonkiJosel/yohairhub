<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Salon;
use App\Models\SalonUser;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class SalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            $user = User::inrandomorder()->first();

            $salon =  Salon::create([
                'name' => $faker->company,
                'address' => $faker->address,
                'city' => $faker->city,
                'image' => $faker->imageUrl(640, 480, 'business'),
                'phone' => $faker->phoneNumber,
                'description' => $faker->paragraph,
                'gender_accepted' => $faker->randomElement(['Male', 'Female', 'Unisex']),
                'uuid' => Str::uuid(),
                'rating' => $faker->numberBetween(1, 5),
                'is_featured' => $faker->boolean,
                'created_at' => $faker->dateTimeThisYear,
                'updated_at' => now(),
            ]);

            SalonUser::create(
                [
                    'salon_id' => $salon->id,
                    'user_id' => $user->id,
                    'is_owner' => true,
                ]
            );
        }
    }
}
