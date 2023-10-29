<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('services')->delete();

        $data = [
            ['name'=>'الترجمة','price'=>'100','description'=>''],
            ['name'=>'الأيجار','price'=>'200','description'=>'']
        ];

        DB::table('services')->insert($data);
    }
}