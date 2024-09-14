<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $primaryKey = 'productId';

    protected $fillable = [
        'productDetailId',
        'productName',
        'productPrice',
        'stock',
        'variant',
        'image'
    ];

    public function productDetail(){
        return $this->belongsTo(productDetail::class, 'productDetailId');
    }

    public function cartList(){
        return $this->hasMany(cartList::class, 'productId');
    }
    public function orderList()
    {
        return $this->hasMany(orderList::class, 'productId');
    }

    public function getImageURL()
    {
        if ($this->image) {
            return url($this->image);
        }
        return "https://api.multiavatar.com/{{ $this->productName }}.svg";
    }

    public function getFormatToRupiah($quantity)
    {
        $value = $this->productPrice * $quantity;
        $formatted = 'Rp' . number_format($value, 0, ',', '.');
        return $formatted;
    }
}
