<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $primaryKey = 'cartId';

    public $timestamps = false;

    
    protected $fillable = [
        'userId',
    ];

    public function user(){
        return $this->hasOne(User::class, 'cartId', 'id');
    }

    public function cartList(){ 
        return $this->hasMany(cartList::class, 'cartId', 'cartId');
    }
}
