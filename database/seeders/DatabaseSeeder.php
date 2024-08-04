<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use App\Models\JobApplication;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        User::factory()->create([
            'name' => 'girish',
            'email' => 'girish@gmail.com'
        ]);
        User::factory()->create([
            'name' => 'manish',
            'email' => 'manish@gmail.com'
        ]);

        User::factory(200)->create();
        $users = User::all()->shuffle();

        for ($i = 0; $i <= 19; $i++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employers = Employer::all();

        for ($i = 0; $i <= 100; $i++) {
            Job::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }

        foreach ($users as $user) {
            $jobs = Job::inRandomOrder()->take(rand(0, 4))->get();

            foreach ($jobs as $job) {

                JobApplication::factory()->create([
                    'job_id' => $job->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
