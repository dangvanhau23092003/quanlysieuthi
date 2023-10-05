<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Model\Bill;
use App\Model\Product;

class Bill_detail extends Model
{
    use HasFactory;

    protected $table = 'bill_detail';

    // public function bill(): Belongto
    // {
    //     return $this->belongsTo(Bill::class, 'id_bill', 'id');
    // }

    // public function products(): Belongto 
    // {   
    //     return $this->belongsTo(Product::class, 'id_product','id');
    // }

}
