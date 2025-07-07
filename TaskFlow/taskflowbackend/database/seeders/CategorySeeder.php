<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create(['id'=> 1,'category_name'=>'Career']);
        Category::create(['id'=> 2,'category_name'=>'Course']);
        Category::create(['id'=> 3,'category_name'=>'University']);
        Category::create(['id'=> 4,'category_name'=>'Student']);

    }
}
