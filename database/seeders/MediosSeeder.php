<?php

namespace Database\Seeders;

use App\Models\Medios;
use Illuminate\Database\Seeder;

class MediosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medios::create([
            'nombre' => 'Radio'
        ]);

        Medios::create([
            'nombre' => 'Televisión'
        ]);

        Medios::create([
            'nombre' => 'Periodicos'
        ]);

        Medios::create([
            'nombre' => 'marquesinas'
        ]);

        Medios::create([
            'nombre' => 'RRSS'
        ]);
    }
}
