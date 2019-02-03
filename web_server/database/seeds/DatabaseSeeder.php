<?php

use Illuminate\Database\Seeder;

use App\Task;
use App\User;
use App\House;
use App\CompletedTask;
use Faker\Provider\DateTime;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // HOUSE
        House::create([
            'house_name' => "Runnymede"
        ]);
        
        House::create([
            'house_name' => "The Cool House"
        ]);


         // TASK
         Task::create([
            'task_name' => "Bins",
            'task_description' => "Empty the recycling and waste bins.",
            'house_id' => 1
        ]);

        Task::create([
            'task_name' => "Bathroom",
            'task_description' => "Clean the sink, shower, and toilet.",
            'house_id' => 1
        ]);

        Task::create([
            'task_name' => "Kitchen",
            'task_description' => "Clean the surfaces and sink, mop the floor.",
            'house_id' => 2
        ]);

        Task::create([
            'task_name' => "Garden",
            'task_description' => "Mow the lawn.",
            'house_id' => 2
        ]);


        // USER
        User::create([
            'name' => "Lisa",
            'email' => "lisa@mail.com",
            'password' => bcrypt('password'),
            'house_id' => 1,
            'hex_colour' => "2b7cff"  // blue
        ]);

        User::create([
            'name' => "Mark",
            'email' => "mark@mail.com",
            'password' => bcrypt("password"),
            'house_id' => 1,
            'hex_colour' => "0f7f11"  // green
        ]);

        User::create([
            'name' => "Phil",
            'email' => "phil@mail.com",
            'password' => bcrypt("password"),
            'house_id' => 1,
            'hex_colour' => "A40607"  // Grand Budapest red
        ]);

        User::create([
            'name' => "George",
            'email' => "george@mail.com",
            'password' => bcrypt("password"),
            'house_id' => 2,
            'hex_colour' => "fff200"  // yellow
        ]);

        User::create([
            'name' => "Ann",
            'email' => "ann@mail.com",
            'password' => bcrypt("password"),
            'house_id' => 2,
            'hex_colour' => "b200ff"  // purple
        ]);


        // COMPLETED_TASK
        // house_id = 1
        for ($i=0; $i < 10; $i++) {
            CompletedTask::create([
                'task_id' => rand(1, 2),
                'house_id' => 1,
                'user_id' => rand(1, 3),
                'created_at' => DateTime::dateTimeBetween($startDate = '-1 month', $endDate = 'now', $timezone = 'UTC')
            ]);
        }

        // house_id = 2
        for ($i=0; $i < 8; $i++) {
            CompletedTask::create([
                'task_id' => rand(3, 4),
                'house_id' => 2,
                'user_id' => rand(4, 5),
                'created_at' => DateTime::dateTimeBetween($startDate = '-1 month', $endDate = 'now', $timezone = 'UTC')
            ]);
        }
    }
}
