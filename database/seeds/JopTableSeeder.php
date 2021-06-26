<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class JopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jops')->insert([
            'name' => 'عامل نظافة'
        ]);
        DB::table('jops')->insert([
            'name' => 'ممرض'
        ]);
        DB::table('jops')->insert([
            'name' => 'تأمين'
        ]);
    }
}
