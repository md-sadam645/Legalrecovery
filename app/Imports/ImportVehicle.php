<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

use App\Models\Vehicle;

class ImportVehicle implements ToModel, WithHeadingRow, WithBatchInserts , WithChunkReading

{
    use Importable;
    
    /**
     * @param array $row
     *
     */

    public function model(array $row) 
    {
        
        $data = Vehicle::where('registration_numbers',$row['registration_numbers'])->where("add_by",Auth::user()->id)->get();
        if(count($data) == '0')
        {
        
            return new Vehicle([
                'registration_numbers'=> $row['registration_numbers'],
                'chasisnum'=> $row['chasisnum'],
                'enginenum'=> $row['enginenum'],
                'allocation'=> $row['allocation'],
                'agreementid'=> $row['agreementid'],
                'username'=> $row['username'],
                'emi_amt'=> $row['emi_amt'],
                'pos'=> $row['pos'],
                'tbr'=> $row['tbr'],
                'bkts'=> $row['bkts'],
                'bank'=> $row['bank'],
                'productname'=> $row['productname'],
                'model'=> $row['model'],
                'address'=> $row['address'],
                'add_by' => Auth::user()->id,
                'add_by_name' => Auth::user()->name,
            ]);
        }
        
    }
    
    public function batchSize(): int
    {
        return 500;
    }
    
    public function chunkSize(): int
    {
        return 500;
    }

}
