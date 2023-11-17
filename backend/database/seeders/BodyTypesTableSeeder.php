<?php

namespace Database\Seeders;

use App\Models\BodyType;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BodyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $check = BodyType::first();
        if (!$check) {
            $json = 'database/seeders/files/body-types.json';
            $data = file_get_contents($json);
            $bodyTypes = json_decode($data, true);

            foreach ($bodyTypes as $bodyType) {
                BodyType::create([
                    'name' => $bodyType['name'],
                    'slug' => Str::slug($bodyType['name']),
                ]);
            }
        }
    }
}
