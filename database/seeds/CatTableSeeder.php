<?php

use Illuminate\Database\Seeder;

class CatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cats')->insert([
            'name' => 'مصروفات',
            'type' => '0',
        ]);
        DB::table('cats')->insert([
            'name' => 'مصروفات تشغيلية',
            'type' => '0',
        ]);
        DB::table('cats')->insert([
            'name' => 'أجور ومرتبات',
            'type' => '0',
        ]);
        DB::table('cats')->insert([
            'name' => 'إيرادات ',
            'type' => '1',
        ]);
    }
}
