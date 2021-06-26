<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CatTableSeeder::class);
        $this->call(BankTableSeeder::class);
        $this->call(BranchTableSeeder::class);
        $this->call(AccountTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(BloodSymbolsTableSeeder::class);
        $this->call(MaritalStatusTableSeeder::class);
        $this->call(JopTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(PaymentMethodTableSeeder::class);
        $this->call(TestTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
