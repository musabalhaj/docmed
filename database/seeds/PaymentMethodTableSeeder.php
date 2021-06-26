<?php
 
use Illuminate\Database\Seeder;

class PaymentMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            'name' => 'نقدي',
            'description' => 'الدفع عن طريق النقد'
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'تحويل بنكي',
            'description' => 'الدفع عن طريق البنك'
        ]);
        
    }
}
