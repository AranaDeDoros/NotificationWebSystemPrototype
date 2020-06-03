<?php

use Illuminate\Database\Seeder;
use App\GroupType;
class GroupTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(GroupType::class, 10)->create();
    }
}
