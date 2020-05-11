<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Suborder extends Model
{
    public function product()
    {
        return $this->belongsTo('\App\Product', 'item_id');
    }
}
