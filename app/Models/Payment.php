<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'paymentID';

    protected $fillable = [
        'billID',
        'paymentRemark',
        'paymentAmount',
        'paymentDate',
        'paymentMethod',
        'paymentStatus',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'billID', 'billID');
    }

}
