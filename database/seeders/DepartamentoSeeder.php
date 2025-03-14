<?php

namespace Database\Seeders;

use App\Models\Ubicacion\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = [
            [
                "nombre" => "Amazonas",
            ],
            [
                "nombre" => "Áncash"
            ],
            [
                "nombre" => "Apurímac"
            ],

            [
                "nombre" => "Arequipa"
            ],

            [
                "nombre" => "Ayacucho"
            ],

            [
                "nombre" => "Cajamarca"
            ],

            [
                "nombre" => "Callao"
            ],

            [
                "nombre" => "Cusco"
            ],

            [
                "nombre" => "Huancavelica"
            ],

            [
                "nombre" => "Huánuco"
            ],

            [
                "nombre" => "Ica"
            ],

            [
                "nombre" => "Junín"
            ],

            [
                "nombre" => "La Libertad"
            ],

            [
                "nombre" => "Lambayeque"
            ],

            [
                "nombre" => "Lima"
            ],

            [
                "nombre" => "Loreto"
            ],

            [
                "nombre" => "Madre de Dios"
            ],

            [
                "nombre" => "Moquegua"
            ],

            [
                "nombre" => "Pasco"
            ],

            [
                "nombre" => "Piura"
            ],

            [
                "nombre" => "Puno"
            ],

            [
                "nombre" => "San Martín"
            ],

            [
                "nombre" => "Tacna"
            ],

            [
                "nombre" => "Tumbes"
            ],

            [
                "nombre" => "Ucayali"
            ],
        ];

        Departamento::insert($departamentos);
    }
}
