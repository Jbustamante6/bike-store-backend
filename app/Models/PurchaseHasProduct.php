<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $purchase_id
 * @property integer $product_id
 * @property Product $product
 * @property Purchase $purchase
 */
class PurchaseHasProduct extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'purchases_has_products';

    /**
     * @var array
     */
    protected $fillable = ['purchase_id', 'product_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchase()
    {
        return $this->belongsTo('App\Models\Purchase');
    }
}
