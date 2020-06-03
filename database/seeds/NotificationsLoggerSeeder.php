<?php

use Illuminate\Database\Seeder;
use App\NotificationsLogger;
class NotificationsLoggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(NotificationsLogger::class, 20)->create();
    }
}
