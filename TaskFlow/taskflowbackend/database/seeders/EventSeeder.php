<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Event::create(['id'=> 1,'title'=>'Fecha entrega último proyecto','description'=>'Se entrega la última parte del proyecto de Interactivas II el próximo lunes','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 3,'course_id'=> 1,'user_specific_id'=> 1, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 2,'title'=>'Proyecto Integrador','description'=>'Reunión de varios cursos para exponer el proyecto integrador','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 1,'course_id'=> 1,'user_specific_id'=> 1, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 3,'title'=>'Entregar esquema de Caja Blanca','description'=>'Ver el video de ISTQB en YouTube, el link está en el PDF','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 2,'course_id'=> 2,'user_specific_id'=> 1, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 4,'title'=>'ExpoMedia 2024','description'=>'Participa en las actividades y presentaciones de los trabajos de los estudiantes de ITM','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 3,'course_id'=> 2,'user_specific_id'=> 1 , 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 5,'title'=>'Respuesta diseño de página web','description'=>'Va de nuevo Joiner','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 3,'course_id'=> 3,'user_specific_id'=> 2, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 6,'title'=>'English Test','description'=>'Topics: Rhetorical patterns, Comparatives and Superlatives, Typographical clues, Vocabulary from Chapters 3-4 English for IT book, Reading comprehension','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 2,'course_id'=> 5,'user_specific_id'=> 1, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 7,'title'=>'Realizar premisa y sipnosis del proyecto','description'=>'Traer para la próxima clase la premisa y la sipnosis terminada','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 2,'course_id'=> 4,'user_specific_id'=> 1, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 8,'title'=>'Dibujar un bodegón','description'=>'Realizar un bodegón con objetos en casa','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 2,'course_id'=> 8,'user_specific_id'=> 1, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 9,'title'=>'Proyecto Final de Spline y Blender','description'=>'Realizar el proyecto final aplicando las técnicas vistas en clases sobre Spline y Blender','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 2,'course_id'=> 3,'user_specific_id'=> 1, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 10,'title'=>'Elaborar una escaleta para el proyecto final','description'=>'Realizar la escaleta como se ha enseñado en clases para el cortometraje','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 2,'course_id'=> 4,'user_specific_id'=> 2, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 11,'title'=>'Book Homework','description'=>'Complete pages 45 to 48 from the English book','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 2,'course_id'=> 5,'user_specific_id'=> 3, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 12,'title'=>'Groot layout','description'=>'Realizar el trabajo tomando en cuenta el zip de mediación','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 2,'course_id'=> 6,'user_specific_id'=> 3, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 13,'title'=>'Entregar el laboratorio 3','description'=>'Entregar el próximo lunes el laboratorio 3','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 3,'course_id'=> 6,'user_specific_id'=> 1, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 14,'title'=>'Crear una BD en Mongo DB','description'=>'Realizar una base de datos tomando en cuenta los pasos vistos en clases','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 2,'course_id'=> 7,'user_specific_id'=> 4, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 15,'title'=>'Enviar el script de la BD','description'=>'El próximo martes enviar por mediación los script de la BD','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 3,'course_id'=> 7,'user_specific_id'=> 1, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 16,'title'=>'Realizar un paisaje','description'=>'Realizar un paisaje tomando en cuenta el punto de fuga','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 2,'course_id'=> 8,'user_specific_id'=> 4, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 17,'title'=>'Traer la maqueta 3D','description'=>'Traer este viernes la maqueta 3D','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 3,'course_id'=> 9,'user_specific_id'=> 1, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 18,'title'=>'Realizar un diseño a color','description'=>'Realizar un diseño tomando en cuenta la psicología del color','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 2,'course_id'=> 9,'user_specific_id'=> 5, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 19,'title'=>'Instalar Dr.Java','description'=>'Instalar el Dr.Java siguiendo los pasos del video subido en mediación','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 3,'course_id'=> 10,'user_specific_id'=> 5, 'finish_date' => '2024-06-07']);
        Event::create(['id'=> 20,'title'=>'Realizar las vistas en Neatbeans','description'=>'Crear dos vistas utilizando Neatbeans','status'=>'Activo','image'=>'img/default-image.png','tag_id'=> 2,'course_id'=> 10,'user_specific_id'=> 1, 'finish_date' => '2024-06-07']);
    }
}
