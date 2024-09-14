<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartList extends Model
{
    use HasFactory;

    protected $table = 'cartList';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'cartId';

    protected $fillable = [
        'cartId',
        'productId',
        'quantity',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cartId', 'cartId');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId', 'productId');
    }

    public function deleteByCompositeKeys($cartId, $productId)
    {
        return $this->where('cartId', $cartId)->where('productId', $productId)->delete();
    }

    public function getImageURL()
    {
        $product = $this->product;
        if ($product->image) {
            return url($product->image);
        }
        return "https://api.multiavatar.com/{{ $product->productName }}.svg";
    }
}
