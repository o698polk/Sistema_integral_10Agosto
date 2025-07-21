<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materia;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materias = [
            [
                'nombre_materia' => 'Matemáticas',
                'detalle_materia' => 'Álgebra, geometría, trigonometría y cálculo básico'
            ],
            [
                'nombre_materia' => 'Lenguaje y Comunicación',
                'detalle_materia' => 'Gramática, literatura, comprensión lectora y expresión escrita'
            ],
            [
                'nombre_materia' => 'Ciencias Naturales',
                'detalle_materia' => 'Biología, química y física básica'
            ],
            [
                'nombre_materia' => 'Historia y Geografía',
                'detalle_materia' => 'Historia universal, historia de Chile y geografía mundial'
            ],
            [
                'nombre_materia' => 'Inglés',
                'detalle_materia' => 'Gramática inglesa, vocabulario y conversación'
            ],
            [
                'nombre_materia' => 'Educación Física',
                'detalle_materia' => 'Deportes, actividad física y salud'
            ],
            [
                'nombre_materia' => 'Arte y Música',
                'detalle_materia' => 'Expresión artística, historia del arte y música'
            ],
            [
                'nombre_materia' => 'Tecnología',
                'detalle_materia' => 'Informática, programación básica y herramientas digitales'
            ],
            [
                'nombre_materia' => 'Filosofía',
                'detalle_materia' => 'Pensamiento crítico, ética y lógica'
            ],
            [
                'nombre_materia' => 'Psicología',
                'detalle_materia' => 'Desarrollo humano, comportamiento y salud mental'
            ]
        ];

        foreach ($materias as $materia) {
            Materia::create($materia);
        }
    }
}
