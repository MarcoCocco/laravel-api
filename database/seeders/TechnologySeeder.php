<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technologies = ['Python', 'JavaScript', 'Java', 'C++', 'C#', 'PHP', 'TypeScript', 'HTML', 'CSS/Sass', 'SQL'];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();

            $newTechnology->name = $technology;
            $newTechnology->slug = Str::slug($newTechnology->name, '-');
            $newTechnology->color = $faker->hexColor();

            $newTechnology->save();
        }
    }
}
