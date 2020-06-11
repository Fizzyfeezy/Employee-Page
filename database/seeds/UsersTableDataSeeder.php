<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'first_name' => 'Tobi',
            'last_name' => 'Taiwo',
            'email' => 'ttobi4@gmail.com',
            'email_verified_at' => now(),
            'occupation' => 'Product manager',
            'phone' => '07038871488',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        user::create([
            'first_name' => 'Kolade',
            'last_name' => 'Funsho',
            'email' => 'kolade@yahoo.com',
            'email_verified_at' => now(),
            'occupation' => 'Software engineer',
            'phone' => '08038871568',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        user::create([
            'first_name' => 'Yomi',
            'last_name' => 'Foladuro',
            'email' => 'yomi@outlook.com',
            'email_verified_at' => now(),
            'occupation' => 'Human resources',
            'phone' => '09039971488',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
