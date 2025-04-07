<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class FileRecordExport implements FromQuery, WithMapping ,WithHeadings
{
     use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    // public function collection()
    // {
        
    //     return Vehicle::where("file_id",$this->id)
    //     ->where("add_by",Auth::user()->id)
    //     ->cursor();
    // }
    
    public function query()
    {
         return Vehicle::query()
        ->where('file_id', $this->id)
        ->where('add_by', Auth::user()->id);
    }

    public function map($fileRecord): array
    {

        return [
            $fileRecord->registration_numbers,
            $fileRecord->chasisnum,
            $fileRecord->enginenum,
            $fileRecord->allocation,
            $fileRecord->agreementid,
            $fileRecord->username,
            $fileRecord->emi_amt,
            $fileRecord->pos,
            $fileRecord->tbr,
            $fileRecord->bkts,
            $fileRecord->bank,
            $fileRecord->productname,
            $fileRecord->model,
            $fileRecord->address,
            $fileRecord->file_id,
        ];
    }

    public function headings(): array
    {
        return [
            'registration_numbers',
            'chasisnum',
            'enginenum',
            'allocation',
            'agreementid',
            'username',
            'emi_amt',
            'pos',
            'tbr',
            'bkts',
            'bank',
            'productname',
            'model',
            'address',
            'file_id',
        ];
    }
}
