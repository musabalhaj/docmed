<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'الباطنية'
        ]);
        DB::table('departments')->insert([
            'name' => 'الجلدية'
        ]);
        DB::table('departments')->insert([
            'name' => 'الأطفال'
        ]);
        DB::table('departments')->insert([
            'name' => 'جراحة الفم والأسنان'
        ]);
        DB::table('departments')->insert([
            'name' => 'الأذن والأنف والحنجرة'
        ]);
    }
}
