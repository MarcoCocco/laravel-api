<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = ['Framework', 'Library', 'Web App', 'Mobile App', 'Plugin/Extension', 'Tool', 'Educational Project', 'Open Source Project', 'Personal Project', 'Company Project'];
        foreach($types as $type) {
            $newType = new Type();

            $newType->name = $type;
            $newType->slug = Str::slug($newType->name, '-');
            $newType->description = $faker->text(255);

            $newType->save();
        }
    }
}
