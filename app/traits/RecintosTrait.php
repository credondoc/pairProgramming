<?php


namespace App\traits;


use App\Models\Recinto;

trait RecintosTrait
{
    private function getPlaces()
    {
        return Recinto::all();
    }
}
