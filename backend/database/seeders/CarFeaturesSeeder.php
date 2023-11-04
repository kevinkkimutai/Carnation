<?php

namespace Database\Seeders;

use App\Models\CarFeature;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarFeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $check = CarFeature::first();
        if (!$check) {
            $json = 'database/seeders/files/car-features.json';
            $data = file_get_contents($json);
            $features = json_decode($data, true);

            foreach ($features as $f) {

                CarFeature::create([
                    'name' => $f['name'],
                    'type' => $f['type'],
                ]);

            }


        }
        ;
    }
}
