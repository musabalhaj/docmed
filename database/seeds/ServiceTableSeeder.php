<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'عملية صغيرة',
            'description'=>'عملية صغيرة',
            'price'=>'400',
            'status'=>'1'
        ]);
        DB::table('services')->insert([
            'name' => 'صورة أشعة',
            'description'=>'صورة أشعة',
            'price'=>'2000',
            'status'=>'1'
        ]);
        DB::table('services')->insert([
            'name' => 'حشوة أسنان',
            'description'=>'حشوة أسنان',
            'price'=>'2500',
            'status'=>'1'
        ]);
    }
}
