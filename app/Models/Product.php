<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Type_product;
use App\Model\Bill_detail;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function type_product(): BelongsTo
    {
        return $this->belongsTo(Type_product::class, 'id_type','id');
    }

    // public function billdetails(): HasMany
    // {
    //     return $this->hasMany(Bill_detail::class, 'id_product','id');
    // }

    public function getProductType() {
        switch ($this -> id_type) {
            case 1:
                return 'Laptop';
            case 2:
                return 'Table';
            case 3:
                return 'Điện thoại';
            default:
                return '';
        }
    }

    public function getNameProduct() {
        switch ($this -> new) {
            case 0:
                return 'Bán chạy nhất';
            case 1:
                return 'Giảm giá sốc';
            default:
                return '';
        }
    }
}
