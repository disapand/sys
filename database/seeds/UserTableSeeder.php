<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => '管理员',
            'Num' => '001',
            'role' => '管理员',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
        ]);
    }
}
