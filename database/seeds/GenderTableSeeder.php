<?php

use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            'name' => 'ذكر'
        ]);
        DB::table('genders')->insert([
            'name' => 'أنثى'
        ]);
    }
}
