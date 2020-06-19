<?php

use Illuminate\Database\Seeder;
use App\NotificationType;
class NotificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(NotificationType::class, 3)->create();
    }
}
