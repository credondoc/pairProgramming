<?php

namespace Database\Seeders;

use App\Models\Recinto;
use Illuminate\Database\Seeder;

class RecintoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recinto::factory()
            ->times(20)
            ->create()
        ;
    }
}
