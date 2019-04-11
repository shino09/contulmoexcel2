<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SIS\User::create([
            'nombre' => 'Administrador',
            'nickname' => 'admin',
            'password' => 'S1st3m4s',
        ]);

        // factory(SIS\User::class,5)->create();
    }
}
