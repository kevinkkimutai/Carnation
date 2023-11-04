<?php

namespace Database\Seeders;

use App\Models\CarMake;
use App\Models\CarModel;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarMakeModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $checkMakes = CarMake::first();
        if (!$checkMakes) {

            $countyJson = 'database/seeders/files/car-models.json';
            $makesData = file_get_contents($countyJson);
            $makes = json_decode($makesData, true);

            foreach ($makes as $make) {
                $slug = Str::slug($make['brand']);
                if (CarMake::where('slug', $slug)->exists()) {
                    $slug .= '-' . Str::random(3);
                }

                $carMake = CarMake::create([
                    'name' => $make['brand'],
                    'slug' => $slug,
                ]);

                // Models
                foreach ($make['models'] as $model) {
                    $modelSlug = Str::slug($model);
                    if (CarModel::where('slug', $modelSlug)->exists()) {
                        $modelSlug .= '-' . $slug;
                    }

                    $carModel = CarModel::create([
                        'name' => $model,
                        'car_make_id' => $carMake->id,
                        'slug' => $modelSlug,
                    ]);
                }
            }


        }
    }
}
