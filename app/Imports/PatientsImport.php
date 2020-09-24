<?php

namespace App\Imports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\ToModel;

class PatientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Patient([
            'name'     => $row[1],
            'age'    => $row[2], 
            'sex'    => $row[3], 
            'DNI'    => $row[4],             
        ]);
    }
}
