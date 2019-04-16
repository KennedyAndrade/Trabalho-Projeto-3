<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => bcrypt('senha000'),
            'dt_nasc' => '1990-01-11',
        ]);
        $user->roles()->attach(1);
    }
}
