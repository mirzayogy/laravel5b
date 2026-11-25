<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Praktikum extends Model
{
    protected $table = 'praktikum';
    protected $guarded = [];

    public const SEMESTER = [1, 2, 3, 4,5 ,6, 7, 8];
    public const SIFAT = ['Wajib', 'Pilihan'];

    public function periode(): BelongsTo
    {
        return $this->belongsTo(Periode::class);
    }
}
