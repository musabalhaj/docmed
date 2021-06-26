<?php

use Illuminate\Database\Seeder;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            'name' => 'السوق العربي',
            'bank_id'=>'1'
        ]);
        DB::table('branches')->insert([
            'name' => 'امدرمان',
            'bank_id'=>'2'
        ]);
        DB::table('branches')->insert([
            'name' => 'المنطقة الصناعية',
            'bank_id'=>'3'
        ]);
        DB::table('branches')->insert([
            'name' => 'بحري',
            'bank_id'=>'1'
        ]);
    }
}
