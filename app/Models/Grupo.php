<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\grupo
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Grupo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grupo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grupo query()
 * @mixin \Eloquent
 */
class Grupo extends Model
{
    use HasFactory;

    public function conciertos()
    {
        return $this->belongsToMany(Concierto::class)->withPivot(['id_concierto','id_grupo']);
    }
}
