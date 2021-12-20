<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')
            ->insert([
                [
                    'name' => 'Muncher prueba',
                    'email' => 'muncher@prueba.com',
                    'password' => \Illuminate\Support\Facades\Hash::make('muncher.prueba'),
                    'status_id' => \App\Status::byStatus(\App\Status::ENABLED)->value('id'),
                    'rol_id' => \App\Rol::byRol(\App\Rol::ADMINISTRATOR_COMMERCE)->value('id')
                ]
            ]);
    }
}
