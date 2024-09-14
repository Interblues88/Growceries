<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;
    protected $table = 'refund';
    protected $primaryKey= 'refundId';

    protected $fillable = [
        'orderId',
        'content',
        'image',
    ];

    public function order(){
        return $this->belongsTo(order::class, 'orderId', 'orderId');
    }

}
