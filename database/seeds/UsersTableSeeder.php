<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'عبدالمنعم محمد',
            'email' => 'musab1marly@gmail.com',
            'password' => bcrypt('1421'),

        ]);
    }
}
