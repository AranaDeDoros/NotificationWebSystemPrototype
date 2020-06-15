<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\User;
use App\Notification;
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
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        //$this->call(UserSeeder::class);
        $this->call(GroupSeeder::class);
        //$this->call(NotificationSeeder::class);

       factory(User::class, 20)->create()->
       each(function($user){
            $user->groups()->syncWithoutDetaching(User::all()->random()->id);
        });

       factory(Notification::class, 20)->create()->
       each(function($notification){
            $notification->groups()->syncWithoutDetaching(Group::all()->random()->id);
        });

        
        //$this->call(NotificationsLoggerSeeder::class);
        
    }
}
