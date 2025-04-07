<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FacilityDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facility_documents_fields')->insert([
            'field_identifier'=>'Field1',
            'label'=>'Emirated Id',
            'required' => 1,
            'visible' => 1,
        ]);
        DB::table('facility_documents_fields')->insert([
            'field_identifier'=>'Field2',
            'label'=>'Aadhar Card',
            'required' => 0,
            'visible' => 1,
        ]);
        DB::table('facility_documents_fields')->insert([
            'field_identifier'=>'Field3',
            'label'=>'Label3',
            'required' => 1,
            'visible' => 1,
        ]);
        DB::table('facility_documents_fields')->insert([
            'field_identifier'=>'Field4',
            'label'=>'Label4',
            'required' => 0,
            'visible' => 0,
        ]);
        DB::table('facility_documents_fields')->insert([
            'field_identifier'=>'Field5',
            'label'=>'Label5',
            'required' => 1,
            'visible' => 1,
        ]);
        DB::table('facility_documents_fields')->insert([
            'field_identifier'=>'Field6',
            'label'=>'Label6',
            'required' => 0,
            'visible' => 0,
        ]);
        DB::table('facility_documents_fields')->insert([
            'field_identifier'=>'Field7',
            'label'=>'Label7',
            'required' => 1,
            'visible' => 1,
        ]);
        DB::table('facility_documents_fields')->insert([
            'field_identifier'=>'Field8',
            'label'=>'Label8',
            'required' => 0,
            'visible' => 0,
        ]);
        DB::table('facility_documents_fields')->insert([
            'field_identifier'=>'Field9',
            'label'=>'Label9',
            'required' => 1,
            'visible' => 1,
        ]);
        DB::table('facility_documents_fields')->insert([
            'field_identifier'=>'Field10',
            'label'=>'Label10',
            'required' => 0,
            'visible' => 0,
        ]);
    }
}
