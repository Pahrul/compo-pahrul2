<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            'Teknologi',
            'Bisnis',
            'Pendidikan',
            'Kesenian Budaya',
            'Olahraga Gen Z',
        ];
        foreach ($categories as $key => $value) {
            Categories::create([
                'name' => $value,
                'slug' => Str::slug($value)
            ]);
        }
    }
}
