<?php

namespace App\Imports;

use App\Models\Curso;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use function PHPUnit\Framework\isInt;

class CursosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (empty($row['c_nomcur'])) {
            return null;
        }
    
        return new Curso([
            'n_codper'  => isset($row['n_codper']) ? trim((string) $row['n_codper']) : null,
            'c_codmod'  => isset($row['c_codmod']) ? trim($row['c_codmod']) : null,
            'c_codfac'  => isset($row['c_codfac']) ? trim($row['c_codfac']) : null,
            'c_codesp'  => isset($row['c_codesp']) ? trim($row['c_codesp']) : null,
            'c_codcur'  => isset($row['c_codcur']) ? trim($row['c_codcur']) : null,
            'c_nomcur'  => isset($row['c_nomcur']) ? trim($row['c_nomcur']) : null,
            'generales' => isset($row['generales']) && !empty($row['generales']) 
                ? trim((string) $row['generales']) 
                : 'CURSOS DE CARRERA', // Si está vacío, asignamos un valor por defecto
        ]);
    }
    
}
