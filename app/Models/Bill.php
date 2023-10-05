<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use App\Model\Bill_detail;
// use App\Model\Personnel;
use App\Models\Customer;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    // public function billdetails(): BelongsToMany
    // {
    //     return $this->belongsToMany(Bill_detail::class, 'id_bill', 'id');
    // }

    // public function personnels(): BelongsTo 
    // {
    //     return $this->belongsTo(Personnel::class, 'id_personnel', 'id');
    // }

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }

}
