<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\SearchHistory;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SearchHistoryExport implements FromCollection, WithMapping ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if(Auth::user()->role == 1)
        {
            $SearchHistory = SearchHistory::all();
        }
        else
        {
            $SearchHistory = SearchHistory::where("add_by",Auth::user()->id)->get();
        }   
        
        return $SearchHistory;
    }

    public function map($SearchHistory): array
    {

        return [
            $SearchHistory->registration_numbers,
            $SearchHistory->chasisnum,
            $SearchHistory->enginenum,
            $SearchHistory->date,
            $SearchHistory->time,
            $SearchHistory->user_name,
            $SearchHistory->admin_name
        ];
    }

    public function headings(): array
    {
        // Exported Excel Headers, in order, which you should match them base on
        // manipulated data in above
        return [
            'registration_numbers',
            'chasisnum',
            'enginenum',
            'date',
            'time',
            'user_name',
            'admin_name'
        ];
    }
}
