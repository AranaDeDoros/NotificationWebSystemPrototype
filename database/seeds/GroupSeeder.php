<?php

use Illuminate\Database\Seeder;
use App\Group;
class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Group::class, 60)->create();
    }
}
