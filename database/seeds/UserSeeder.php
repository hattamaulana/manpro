<?php

use App\Agent;
use App\Customer;
use App\Driver;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'superadmin',
                'password' => '$2b$10$BXLVQH7sPvyh8UzaRuTL/OqMEVzeBylM110FL1yi8R02w.eXUzX1.',
                'role_id' => 1
            ],
            [
                'username' => 'psikolog1',
                'password' => '$2b$10$BXLVQH7sPvyh8UzaRuTL/OqMEVzeBylM110FL1yi8R02w.eXUzX1.',
                'role_id' => 2
            ],
        ]);
    }
}
