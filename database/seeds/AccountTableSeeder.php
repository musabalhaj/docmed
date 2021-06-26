<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'name' => 'غفران احمد',
            'bank_id'=>'1',
            'branch_id'=>'1',
            'account_num'=>'1234',
            'password' => '1421',
            'amount'=>'5000'
        ]);
        DB::table('accounts')->insert([
            'name' => 'عبدالعاطي عزالدين',
            'bank_id'=>'2',
            'branch_id'=>'2',
            'account_num'=>'12345',
            'password' => '1421',
            'amount'=>'4000'
        ]);
        DB::table('accounts')->insert([
            'name' => 'احمد مبارك',
            'bank_id'=>'3',
            'branch_id'=>'3',
            'account_num'=>'123',
            'password' =>'1421',
            'amount'=>'50'
        ]);
    }
}
