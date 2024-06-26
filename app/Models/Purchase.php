<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * @property integer $id
 * @property integer $purchaser_id
 * @property integer $seller_id
 * @property integer $payment_method_id
 * @property string $purchase_date
 * @property mixed $details
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Refund[] $refunds
 * @property Product[] $products
 * @property PaymentMethod $paymentMethod
 * @property User $purchaser
 * @property User $seller
 * @property Shipping[] $shippings
 */
class Purchase extends Model implements Auditable
{
    use SoftDeletes, CascadeSoftDeletes;
    use \OwenIt\Auditing\Auditable;
    /**
     * @var array
     */
    protected $fillable = ['purchaser_id', 'seller_id', 'payment_method_id', 'purchase_date', 'details', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function refunds()
    {
        return $this->hasMany('App\Models\Refund');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'purchases_has_products');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchaser()
    {
        return $this->belongsTo('App\Models\User', 'purchaser_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo('App\Models\User', 'seller_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shippings()
    {
        return $this->hasMany('App\Models\Shipping');
    }
}
