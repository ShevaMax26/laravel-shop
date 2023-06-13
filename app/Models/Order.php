<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const PAYMENT_STATUS_PENDING = 1;
    const PAYMENT_STATUS_PAID = 2;
    public function getPaymentStatusString()
    {
        switch ($this->payment_status) {
            case self::PAYMENT_STATUS_PENDING:
                return 'pending';
            case self::PAYMENT_STATUS_PAID:
                return 'paid';
            default:
                return '';
        }
    }
    protected $fillable = [
        'user_id',
        'products',
        'total_price',
        'payment_status',
    ];
    protected static $unguarded = false;
}
