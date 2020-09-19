<?php

namespace Database\Seeders;

use App\Models\Promotor;
use Illuminate\Database\Seeder;

class PromotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promotor::factory()
            ->times(20)
            ->create()
        ;
    }
}
