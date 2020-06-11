<?php

use Illuminate\Database\Seeder;
use App\Employer;
use Carbon\Carbon;

class EmployersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employer::create([
            'user_id' => 2,
            'status' => 'worker',
            'salary' => '200000',
            'status_time' => '5 years',
            'classification' => 'Full time',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Employer::create([
            'user_id' => 1,
            'status' => 'worker',
            'salary' => '500000',
            'status_time' => '1 Year',
            'classification' => 'Full time',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Employer::create([
            'user_id' => 3,
            'status' => 'test period',
            'salary' => '100000',
            'status_time' => '2 Months',
            'classification' => 'part time',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        //factory(App\Employer::class, 3)->create();
    }
}
