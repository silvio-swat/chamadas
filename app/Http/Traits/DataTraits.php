<?php

namespace App\Http\Traits;

trait DataTrait
{
    public function getData($model)
    {
        // Fetch all the data according to model
        return $model::all();
    }
}