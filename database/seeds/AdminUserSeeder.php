<?php

use App\AdminUser;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('admin_users')->insert([
            'name' => 'Jigyel',
            'email' => 'gyeljiyeshey.dorjee@gmail.com',
            'password' => Hash::make('Jigyel@123'),
             ]);

    }
}
