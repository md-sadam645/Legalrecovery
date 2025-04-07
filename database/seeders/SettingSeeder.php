<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'option_name'=>'privacy_policy',
            'option_value'=>Str::random(10000),
            'last_modified_via'=>'1',
            'status'=>'1',
        ]);
        DB::table('settings')->insert([
            'option_name'=>'term_condition',
            'option_value'=>Str::random(100),
            'last_modified_via'=>'1',
            'status'=>'1',
        ]);
        DB::table('settings')->insert([
            'option_name'=>'platform_fees',
            'option_value'=>6000,
            'last_modified_via'=>'1',
            'status'=>'1',
        ]);
        DB::table('settings')->insert([
            'option_name'=>'b2btooltip',
            'option_value'=>Str::random(50),
            'last_modified_via'=>'1',
            'status'=>'1',
        ]);

        
    }
}
