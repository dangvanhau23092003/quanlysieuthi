<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Bill;

class Personnel extends Model
{
    use HasFactory;

    protected $table = 'personnels';

    // public function bill(): HasMany
    // {
    //     return $this->hasMany(Bill::class, 'id_personnel','id');
    // }
}
