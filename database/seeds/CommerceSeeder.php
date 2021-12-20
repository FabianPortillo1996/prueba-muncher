<?php

use Illuminate\Database\Seeder;

class CommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('commerces')
            ->insert([
                [
                    'name' => 'Muncer comercio',
                    'nit' => 12312312,
                    'contact' => 'fabianportillo97@gmail.com',
                    'email' => 'fabianportillo97@gmail.com',
                    'address' => 'calle',
                    'phone' => 3125311063,
                    'web' => 'https://google.com',
                    'latitude' => 1,
                    'longitude' => 2,
                    'attention_schedule' => '1 - 2',
                    'quantity_table' => '3',
                    'city_id' => 1,
                    'status_id' => \App\Status::byStatus(\App\Status::ENABLED)->value('id'),
                    'user_id' =>1,
                    'security_code' => 'QRS'
                ]
            ]);
    }
}
