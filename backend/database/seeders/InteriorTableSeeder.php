<?php

namespace Database\Seeders;

use App\Models\Interior;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InteriorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $check = Interior::first();
        if (!$check) {
            $json = 'database/seeders/files/interior.json';
            $data = file_get_contents($json);
            $bodyTypes = json_decode($data, true);

            foreach ($bodyTypes as $bodyType) {
                Interior::create([
                    'name' => $bodyType['name'],
                    'slug' => Str::slug($bodyType['name']),
                ]);
            }
        }
    }
}
