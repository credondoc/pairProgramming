<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\concierto
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Concierto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Concierto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Concierto query()
 * @mixin \Eloquent
 */
class Concierto extends Model
{
    use HasFactory;

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class)->withPivot(['id_concierto','id_grupo']);
    }

    public function medios()
    {
        return $this->belongsToMany(Grupo::class)->withPivot(['id_concierto','id_medio']);
    }
}
