<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CountryScope implements Scope
{
    //Cuando se haga una consulta de un modelo con este scope, no se mostrarán las filas
    //donde el país sea India
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('country', '!=', 'India');
    }
}