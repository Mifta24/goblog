<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Web desain',
                'slug' => 'web-desain',
                'color'=>'blue',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Machine Learning',
                'slug' => 'machine-learning',
                'color'=>'red',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Application',
                'slug' => 'apk-exe',
                'color'=>'yellow',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Data Science',
                'slug' => 'data-science',
                'color'=>'green',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Data Entry',
                'slug' => 'data-entry',
                'color'=>'orange',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        foreach ($data as $d) {
            Category::create($d);
        }
    }
}
