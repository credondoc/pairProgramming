<?php


namespace App\traits;


use App\Models\Grupo;

trait GruposTrait
{

    private function getGroups()
    {
        return Grupo::all();
    }

}
