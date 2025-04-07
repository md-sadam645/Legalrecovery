<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SearchCriteria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('search_criterias')->insert([
            'country'=>'Dubai',
            'name'=>'City',
            'sequence' => '1',
            'status'=>'1',
        ]);
        DB::table('search_criterias')->insert([
            'country'=>'Dubai',
            'name'=>'District',
            'sequence' => '2',
            'status'=>'1',
        ]);
        DB::table('search_criterias')->insert([
            'country'=>'Dubai',
            'name'=>'State',
            'sequence' => '3',
            'status'=>'1',
        ]);
        DB::table('search_criterias')->insert([
            'country'=>'Dubai',
            'name'=>'Country',
            'sequence' => '4',
            'status'=>'1',
        ]);
    }
}
