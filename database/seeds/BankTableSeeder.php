<?php

use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            'name' => 'الخرطوم'
        ]);
        DB::table('banks')->insert([
            'name' => 'النيلين'
        ]);
        DB::table('banks')->insert([
            'name' => 'فيصل الإسلامي'
        ]);
    }
}
