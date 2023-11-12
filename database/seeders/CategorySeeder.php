<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect([
            [
                'id' => 1,
                'title' => 'Bug Report',
            ],
            [
                'id' => 2,
                'title' => 'Feature Request',
            ],
            [
                'id' => 3,
                'title' => 'Improvement',
            ],
        ]);

        $categories->map(fn ($category) => Category::updateOrCreate($category));
    }
}
