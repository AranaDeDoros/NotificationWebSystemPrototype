<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupTypeSeeder::class);
        $this->call(NotificationTypeSeeder::class);
       	$this->call(ScheduleSeeder::class);
        
        $this->call(GroupSeeder::class);
       
        $this->call(NotificationSeeder::class);


        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        
        $this->call(NotificationsLoggerSeeder::class);
        
    }
}
