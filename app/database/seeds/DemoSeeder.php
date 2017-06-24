<?php

use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'first_name' => 'Appoets',
            'last_name' => 'Demo',
            'email' => 'demo@appoets.com',
            'password' => bcrypt('123456'),
        ]);

        DB::table('providers')->truncate();
        DB::table('providers')->insert([
            'first_name' => 'Appoets',
            'last_name' => 'Demo',
            'email' => 'demo@appoets.com',
            'password' => bcrypt('123456'),
            'status' => 'approved',
            'latitude' => '13.00',
            'longitude' => '80.00'
        ]);

        DB::table('provider_services')->truncate();
        DB::table('provider_services')->insert([
            'provider_id' => 1,
            'service_type_id' => 1,
            'status' => 'active',
            'service_number' => '4ppo3ts',
            'service_model' => 'Audi R8',
        ]);
    }
}
