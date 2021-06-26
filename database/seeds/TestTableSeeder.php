<?php

use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->insert([
            'name' => 'C.B.C',
            'description'=>'العد الدموي الشامل',
            'price'=>'1000'
        ]);
        DB::table('tests')->insert([
            'name' => 'R.S.E',
            'description'=>'معدل ترسيب كريات الدم الحمراء ',
            'price'=>'7000'
        ]);
        DB::table('tests')->insert([
            'name' => 'TP',
            'description'=>'فحص البروتين الكلي',
            'price'=>'4000'
        ]);
        DB::table('tests')->insert([
            'name' => 'TTPA',
            'description'=>'فحص الزهري',
            'price'=>'100'
        ]);
        DB::table('tests')->insert([
            'name' => 'TB',
            'description'=>'تحليل  السيلين الجلدي',
            'price'=>'1200'
        ]);
        DB::table('tests')->insert([
            'name' => 'DP6G',
            'description'=>'فحص انيميا الفول',
            'price'=>'200'
        ]);
        DB::table('tests')->insert([
            'name' => 'TSA',
            'description'=>'العد الدموي ',
            'price'=>'1040'
        ]);
        DB::table('tests')->insert([
            'name' => 'TPG',
            'description'=>'فحص الدم',
            'price'=>'500'
        ]);
        DB::table('tests')->insert([
            'name' => 'HDL',
            'description'=>'الدرن',
            'price'=>'10000'
        ]);
        DB::table('tests')->insert([
            'name' => 'KC',
            'description'=>'فحص السكري',
            'price'=>'5000'
        ]);
        DB::table('tests')->insert([
            'name' => 'GCHB',
            'description'=>'فحص الضغط',
            'price'=>'1200'
        ]);
    }
}
