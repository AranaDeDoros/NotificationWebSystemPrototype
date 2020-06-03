<?php

use Illuminate\Database\Seeder;
use App\Schedule;
class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Schedule::class, 20)->create();
    }
}
