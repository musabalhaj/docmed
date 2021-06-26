<?php

use Illuminate\Database\Seeder;

class MaritalStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marital_statuses')->insert([
            'name' => 'عاذب/عاذبة'
        ]);
        DB::table('marital_statuses')->insert([
            'name' => 'متزوج/متزوجة'
        ]);
        DB::table('marital_statuses')->insert([
            'name' => 'مطلق/مطلقة'
        ]);
        DB::table('marital_statuses')->insert([
            'name' => 'ارمل/ارملة'
        ]);
    }
}
