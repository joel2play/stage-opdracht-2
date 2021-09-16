<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => Role::ADMIN,
            'name' => 'admin'
        ]);

        Role::create([
            'id' => Role::USER,
            'name' => 'user'
        ]);
    }
}
