<?php

namespace Database\Seeders;

use App\Models\Ubicacion\Provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provincias = [
            [
                "nombre" => "Chachapoyas",
                "departamento_id" => "01"
            ],

            [
                "nombre" => "Bagua",
                "departamento_id" => "01"
            ],

            [
                "nombre" => "Bongará",
                "departamento_id" => "01"
            ],

            [
                "nombre" => "Condorcanqui",
                "departamento_id" => "01"
            ],

            [
                "nombre" => "Luya",
                "departamento_id" => "01"
            ],

            [
                "nombre" => "Rodríguez de Mendoza",
                "departamento_id" => "01"
            ],

            [
                "nombre" => "Utcubamba",
                "departamento_id" => "01"
            ],

            [
                "nombre" => "Huaraz",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Aija",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Antonio Raymondi",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Asunción",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Bolognesi",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Carhuaz",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Carlos Fermín Fitzcarrald",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Casma",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Corongo",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Huari",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Huarmey",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Huaylas",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Mariscal Luzuriaga",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Ocros",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Pallasca",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Pomabamba",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Recuay",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Santa",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Sihuas",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Yungay",
                "departamento_id" => "02"
            ],

            [
                "nombre" => "Abancay",
                "departamento_id" => "03"
            ],

            [
                "nombre" => "Andahuaylas",
                "departamento_id" => "03"
            ],

            [
                "nombre" => "Antabamba",
                "departamento_id" => "03"
            ],

            [
                "nombre" => "Aymaraes",
                "departamento_id" => "03"
            ],

            [
                "nombre" => "Cotabambas",
                "departamento_id" => "03"
            ],

            [
                "nombre" => "Chincheros",
                "departamento_id" => "03"
            ],

            [
                "nombre" => "Grau",
                "departamento_id" => "03"
            ],

            [
                "nombre" => "Arequipa",
                "departamento_id" => "04"
            ],

            [
                "nombre" => "Camaná",
                "departamento_id" => "04"
            ],

            [
                "nombre" => "Caravelí",
                "departamento_id" => "04"
            ],

            [
                "nombre" => "Castilla",
                "departamento_id" => "04"
            ],

            [
                "nombre" => "Caylloma",
                "departamento_id" => "04"
            ],

            [
                "nombre" => "Condesuyos",
                "departamento_id" => "04"
            ],

            [
                "nombre" => "Islay",
                "departamento_id" => "04"
            ],

            [
                "nombre" => "La Uniòn",
                "departamento_id" => "04"
            ],

            [
                "nombre" => "Huamanga",
                "departamento_id" => "05"
            ],

            [
                "nombre" => "Cangallo",
                "departamento_id" => "05"
            ],

            [
                "nombre" => "Huanca Sancos",
                "departamento_id" => "05"
            ],

            [
                "nombre" => "Huanta",
                "departamento_id" => "05"
            ],

            [
                "nombre" => "La Mar",
                "departamento_id" => "05"
            ],

            [
                "nombre" => "Lucanas",
                "departamento_id" => "05"
            ],

            [
                "nombre" => "Parinacochas",
                "departamento_id" => "05"
            ],

            [
                "nombre" => "Pàucar del Sara Sara",
                "departamento_id" => "05"
            ],

            [
                "nombre" => "Sucre",
                "departamento_id" => "05"
            ],

            [
                "nombre" => "Víctor Fajardo",
                "departamento_id" => "05"
            ],

            [
                "nombre" => "Vilcas Huamán",
                "departamento_id" => "05"
            ],

            [
                "nombre" => "Cajamarca",
                "departamento_id" => "06"
            ],

            [
                "nombre" => "Cajabamba",
                "departamento_id" => "06"
            ],

            [
                "nombre" => "Celendín",
                "departamento_id" => "06"
            ],

            [
                "nombre" => "Chota",
                "departamento_id" => "06"
            ],

            [
                "nombre" => "Contumazá",
                "departamento_id" => "06"
            ],

            [
                "nombre" => "Cutervo",
                "departamento_id" => "06"
            ],

            [
                "nombre" => "Hualgayoc",
                "departamento_id" => "06"
            ],

            [
                "nombre" => "Jaén",
                "departamento_id" => "06"
            ],

            [
                "nombre" => "San Ignacio",
                "departamento_id" => "06"
            ],

            [
                "nombre" => "San Marcos",
                "departamento_id" => "06"
            ],

            [
                "nombre" => "San Miguel",
                "departamento_id" => "06"
            ],

            [
                "nombre" => "San Pablo",
                "departamento_id" => "06"
            ],

            [
                "nombre" => "Santa Cruz",
                "departamento_id" => "06"
            ],

            [
                "nombre" => "Prov. Const. del Callao",
                "departamento_id" => "07"
            ],

            [
                "nombre" => "Cusco",
                "departamento_id" => "08"
            ],

            [
                "nombre" => "Acomayo",
                "departamento_id" => "08"
            ],

            [
                "nombre" => "Anta",
                "departamento_id" => "08"
            ],

            [
                "nombre" => "Calca",
                "departamento_id" => "08"
            ],

            [
                "nombre" => "Canas",
                "departamento_id" => "08"
            ],

            [
                "nombre" => "Canchis",
                "departamento_id" => "08"
            ],

            [
                "nombre" => "Chumbivilcas",
                "departamento_id" => "08"
            ],

            [
                "nombre" => "Espinar",
                "departamento_id" => "08"
            ],

            [
                "nombre" => "La Convención",
                "departamento_id" => "08"
            ],

            [
                "nombre" => "Paruro",
                "departamento_id" => "08"
            ],

            [
                "nombre" => "Paucartambo",
                "departamento_id" => "08"
            ],

            [
                "nombre" => "Quispicanchi",
                "departamento_id" => "08"
            ],

            [
                "nombre" => "Urubamba",
                "departamento_id" => "08"
            ],

            [
                "nombre" => "Huancavelica",
                "departamento_id" => "09"
            ],

            [
                "nombre" => "Acobamba",
                "departamento_id" => "09"
            ],

            [
                "nombre" => "Angaraes",
                "departamento_id" => "09"
            ],

            [
                "nombre" => "Castrovirreyna",
                "departamento_id" => "09"
            ],

            [
                "nombre" => "Churcampa",
                "departamento_id" => "09"
            ],

            [
                "nombre" => "Huaytará",
                "departamento_id" => "09"
            ],

            [
                "nombre" => "Tayacaja",
                "departamento_id" => "09"
            ],

            [
                "nombre" => "Huánuco",
                "departamento_id" => "10"
            ],

            [
                "nombre" => "Ambo",
                "departamento_id" => "10"
            ],

            [
                "nombre" => "Dos de Mayo",
                "departamento_id" => "10"
            ],

            [
                "nombre" => "Huacaybamba",
                "departamento_id" => "10"
            ],

            [
                "nombre" => "Huamalíes",
                "departamento_id" => "10"
            ],

            [
                "nombre" => "Leoncio Prado",
                "departamento_id" => "10"
            ],

            [
                "nombre" => "Marañón",
                "departamento_id" => "10"
            ],

            [
                "nombre" => "Pachitea",
                "departamento_id" => "10"
            ],

            [
                "nombre" => "Puerto Inca",
                "departamento_id" => "10"
            ],

            [
                "nombre" => "Lauricocha ",
                "departamento_id" => "10"
            ],

            [
                "nombre" => "Yarowilca ",
                "departamento_id" => "10"
            ],

            [
                "nombre" => "Ica ",
                "departamento_id" => "11"
            ],

            [
                "nombre" => "Chincha ",
                "departamento_id" => "11"
            ],

            [
                "nombre" => "Nasca ",
                "departamento_id" => "11"
            ],

            [
                "nombre" => "Palpa ",
                "departamento_id" => "11"
            ],

            [
                "nombre" => "Pisco ",
                "departamento_id" => "11"
            ],

            [
                "nombre" => "Huancayo ",
                "departamento_id" => "12"
            ],

            [
                "nombre" => "Concepción ",
                "departamento_id" => "12"
            ],

            [
                "nombre" => "Chanchamayo ",
                "departamento_id" => "12"
            ],

            [
                "nombre" => "Jauja ",
                "departamento_id" => "12"
            ],

            [
                "nombre" => "Junín ",
                "departamento_id" => "12"
            ],

            [
                "nombre" => "Satipo ",
                "departamento_id" => "12"
            ],

            [
                "nombre" => "Tarma ",
                "departamento_id" => "12"
            ],

            [
                "nombre" => "Yauli ",
                "departamento_id" => "12"
            ],

            [
                "nombre" => "Chupaca ",
                "departamento_id" => "12"
            ],

            [
                "nombre" => "Trujillo ",
                "departamento_id" => "13"
            ],

            [
                "nombre" => "Ascope ",
                "departamento_id" => "13"
            ],

            [
                "nombre" => "Bolívar ",
                "departamento_id" => "13"
            ],

            [
                "nombre" => "Chepén ",
                "departamento_id" => "13"
            ],

            [
                "nombre" => "Julcán ",
                "departamento_id" => "13"
            ],

            [
                "nombre" => "Otuzco ",
                "departamento_id" => "13"
            ],

            [
                "nombre" => "Pacasmayo ",
                "departamento_id" => "13"
            ],

            [
                "nombre" => "Pataz ",
                "departamento_id" => "13"
            ],

            [
                "nombre" => "Sánchez Carrión ",
                "departamento_id" => "13"
            ],

            [
                "nombre" => "Santiago de Chuco ",
                "departamento_id" => "13"
            ],

            [
                "nombre" => "Gran Chimú ",
                "departamento_id" => "13"
            ],

            [
                "nombre" => "Virú ",
                "departamento_id" => "13"
            ],

            [
                "nombre" => "Chiclayo ",
                "departamento_id" => "14"
            ],

            [
                "nombre" => "Ferreñafe ",
                "departamento_id" => "14"
            ],

            [
                "nombre" => "Lambayeque ",
                "departamento_id" => "14"
            ],

            [
                "nombre" => "Lima ",
                "departamento_id" => "15"
            ],

            [
                "nombre" => "Barranca ",
                "departamento_id" => "15"
            ],

            [
                "nombre" => "Cajatambo ",
                "departamento_id" => "15"
            ],

            [
                "nombre" => "Canta ",
                "departamento_id" => "15"
            ],

            [
                "nombre" => "Cañete ",
                "departamento_id" => "15"
            ],

            [
                "nombre" => "Huaral ",
                "departamento_id" => "15"
            ],

            [
                "nombre" => "Huarochirí ",
                "departamento_id" => "15"
            ],

            [
                "nombre" => "Huaura ",
                "departamento_id" => "15"
            ],

            [
                "nombre" => "Oyón ",
                "departamento_id" => "15"
            ],

            [
                "nombre" => "Yauyos ",
                "departamento_id" => "15"
            ],

            [
                "nombre" => "Maynas ",
                "departamento_id" => "16"
            ],

            [
                "nombre" => "Alto Amazonas ",
                "departamento_id" => "16"
            ],

            [
                "nombre" => "Loreto ",
                "departamento_id" => "16"
            ],

            [
                "nombre" => "Mariscal Ramón Castilla ",
                "departamento_id" => "16"
            ],

            [
                "nombre" => "Requena ",
                "departamento_id" => "16"
            ],

            [
                "nombre" => "Ucayali ",
                "departamento_id" => "16"
            ],

            [
                "nombre" => "Datem del Marañón ",
                "departamento_id" => "16"
            ],

            [
                "nombre" => "Putumayo",
                "departamento_id" => "16"
            ],

            [
                "nombre" => "Tambopata ",
                "departamento_id" => "17"
            ],

            [
                "nombre" => "Manu ",
                "departamento_id" => "17"
            ],

            [
                "nombre" => "Tahuamanu ",
                "departamento_id" => "17"
            ],

            [
                "nombre" => "Mariscal Nieto ",
                "departamento_id" => "18"
            ],

            [
                "nombre" => "General Sánchez Cerro ",
                "departamento_id" => "18"
            ],

            [
                "nombre" => "Ilo ",
                "departamento_id" => "18"
            ],

            [
                "nombre" => "Pasco ",
                "departamento_id" => "19"
            ],

            [
                "nombre" => "Daniel Alcides Carrión ",
                "departamento_id" => "19"
            ],

            [
                "nombre" => "Oxapampa ",
                "departamento_id" => "19"
            ],

            [
                "nombre" => "Piura ",
                "departamento_id" => "20"
            ],

            [
                "nombre" => "Ayabaca ",
                "departamento_id" => "20"
            ],

            [
                "nombre" => "Huancabamba ",
                "departamento_id" => "20"
            ],

            [
                "nombre" => "Morropón ",
                "departamento_id" => "20"
            ],

            [
                "nombre" => "Paita ",
                "departamento_id" => "20"
            ],

            [
                "nombre" => "Sullana ",
                "departamento_id" => "20"
            ],

            [
                "nombre" => "Talara ",
                "departamento_id" => "20"
            ],

            [
                "nombre" => "Sechura ",
                "departamento_id" => "20"
            ],

            [
                "nombre" => "Puno ",
                "departamento_id" => "21"
            ],

            [
                "nombre" => "Azángaro ",
                "departamento_id" => "21"
            ],

            [
                "nombre" => "Carabaya ",
                "departamento_id" => "21"
            ],

            [
                "nombre" => "Chucuito ",
                "departamento_id" => "21"
            ],

            [
                "nombre" => "El Collao ",
                "departamento_id" => "21"
            ],

            [
                "nombre" => "Huancané ",
                "departamento_id" => "21"
            ],

            [
                "nombre" => "Lampa ",
                "departamento_id" => "21"
            ],

            [
                "nombre" => "Melgar ",
                "departamento_id" => "21"
            ],

            [
                "nombre" => "Moho ",
                "departamento_id" => "21"
            ],

            [
                "nombre" => "San Antonio de Putina ",
                "departamento_id" => "21"
            ],

            [
                "nombre" => "San Román ",
                "departamento_id" => "21"
            ],

            [
                "nombre" => "Sandia ",
                "departamento_id" => "21"
            ],

            [
                "nombre" => "Yunguyo ",
                "departamento_id" => "21"
            ],

            [
                "nombre" => "Moyobamba ",
                "departamento_id" => "22"
            ],

            [
                "nombre" => "Bellavista ",
                "departamento_id" => "22"
            ],

            [
                "nombre" => "El Dorado ",
                "departamento_id" => "22"
            ],

            [
                "nombre" => "Huallaga ",
                "departamento_id" => "22"
            ],

            [
                "nombre" => "Lamas ",
                "departamento_id" => "22"
            ],

            [
                "nombre" => "Mariscal Cáceres ",
                "departamento_id" => "22"
            ],

            [
                "nombre" => "Picota ",
                "departamento_id" => "22"
            ],

            [
                "nombre" => "Rioja ",
                "departamento_id" => "22"
            ],

            [
                "nombre" => "San Martín ",
                "departamento_id" => "22"
            ],

            [
                "nombre" => "Tocache ",
                "departamento_id" => "22"
            ],

            [
                "nombre" => "Tacna ",
                "departamento_id" => "23"
            ],

            [
                "nombre" => "Candarave ",
                "departamento_id" => "23"
            ],

            [
                "nombre" => "Jorge Basadre ",
                "departamento_id" => "23"
            ],

            [
                "nombre" => "Tarata ",
                "departamento_id" => "23"
            ],

            [
                "nombre" => "Tumbes ",
                "departamento_id" => "24"
            ],

            [
                "nombre" => "Contralmirante Villar ",
                "departamento_id" => "24"
            ],

            [
                "nombre" => "Zarumilla ",
                "departamento_id" => "24"
            ],

            [
                "nombre" => "Coronel Portillo ",
                "departamento_id" => "25"
            ],

            [
                "nombre" => "Atalaya ",
                "departamento_id" => "25"
            ],

            [
                "nombre" => "Padre Abad ",
                "departamento_id" => "25"
            ],

            [
                "nombre" => "Purús",
                "departamento_id" => "25"
            ],
        ];

        Provincia::insert($provincias);
    }
}
