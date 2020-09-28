<?php

namespace App\Imports;

use App\Models\Worker;
use Maatwebsite\Excel\Concerns\ToModel;

// Importa un archivo excel segun sus filas

class WorkersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Worker([
            'name'     => $row[1],
            'age'    => $row[2], 
            'sex'    => $row[3], 
            'DNI'    => $row[4],             
        ]);
    }
}
