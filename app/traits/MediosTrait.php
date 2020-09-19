<?php


namespace App\traits;


use App\Models\Medios;

trait MediosTrait
{

    private function getAdvertising()
    {
        return Medios::all();
    }

}
