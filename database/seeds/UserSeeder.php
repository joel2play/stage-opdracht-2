<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'joel2play',
            'email' => 'joelriemersma03@gmail.com',
            'password' => Hash::make('119875123Ja!'),
            'role_id' => Role::ADMIN
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => Hash::make('user'),
            'role_id' => Role::USER,
        ]);
    }
}
