<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Periode extends Model
{
    protected $table = 'periode';
    protected $guarded = [];

    public function praktikum(): HasMany
    {
        return $this->hasMany(Praktikum::class);
    }
}
