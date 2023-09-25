<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Row;
class ImportUser implements ToModel, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       
             return new User([
            'name' => $row[0],
            'email' => $row[1],
            'password' => bcrypt($row[2]),
            'phone' => $row[3],
       
        ]);
    }
    public function chunkSize(): int
    {
        return 50; // Number of rows to process per chunk.
    }
}
