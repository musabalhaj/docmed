<?php

use Illuminate\Database\Seeder;

class BloodSymbolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_symbols')->insert([
            'name' => 'A '
        ]);
        DB::table('blood_symbols')->insert([
            'name' => 'B '
        ]);
        DB::table('blood_symbols')->insert([
            'name' => 'AB '
        ]);
        DB::table('blood_symbols')->insert([
            'name' => 'O '
        ]);
        DB::table('blood_symbols')->insert([
            'name' => 'RH -'
        ]);
        DB::table('blood_symbols')->insert([
            'name' => 'RH +'
        ]);
    }
}
