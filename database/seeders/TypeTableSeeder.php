<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Type;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'front_end',
            'back_end',
            'full_stack'
        ];

        foreach ($types as $type) {
            $newType = Type::create([
                'name' => $type,
            ]);
        }
    }
}
