<?php


namespace App\traits;


use App\Models\Promotor;

trait PromotoresTrait
{

    private function getSponsor()
    {
        return Promotor::all();
    }

}
