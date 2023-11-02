<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('languages')->delete();

        $data = [
            ['name'=>'العربى'],
            ['name'=>'الأنجليزى']
        ];

        DB::table('languages')->insert($data);
    }
}