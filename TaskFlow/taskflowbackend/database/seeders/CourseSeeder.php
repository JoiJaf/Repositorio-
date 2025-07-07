<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::create(['id'=> 1,'category_id'=> 2,'course_name'=>'Interactivas II','teacher'=>'Jorge Miranda']);
        Course::create(['id'=> 2,'category_id'=> 2,'course_name'=>'Ingeniería de Aplicaciones Interactivas','teacher'=>'Roberto Escobar']);
        Course::create(['id'=> 3,'category_id'=> 2,'course_name'=>'Diseño de páginas web','teacher'=>'Finki Finkenzelle']);
        Course::create(['id'=> 4,'category_id'=> 2,'course_name'=>'Manipulación de audio y video','teacher'=>'Alexandre Rojas']);
        Course::create(['id'=> 5,'category_id'=> 2,'course_name'=>'Lectura en Inglés para Informática','teacher'=>'Daniela Gómez']);
        Course::create(['id'=> 6,'category_id'=> 2,'course_name'=>'Interactivas I','teacher'=>'Jorge Miranda']);
        Course::create(['id'=> 7,'category_id'=> 2,'course_name'=>'Bases de datos','teacher'=>'Ronald Peréz']);
        Course::create(['id'=> 8,'category_id'=> 2,'course_name'=>'Dibujo','teacher'=>'Finki Finkenzelle']);
        Course::create(['id'=> 9,'category_id'=> 2,'course_name'=>'Diseño','teacher'=>'Veronica Solano']);
        Course::create(['id'=> 10,'category_id'=> 2,'course_name'=>'Fundamentos de programación','teacher'=>'Raquel Segnni']);
        
    }
}
