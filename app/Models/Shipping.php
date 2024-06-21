<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $shipping_company_id
 * @property integer $purchase_id
 * @property integer $address_id
 * @property string $tracking_number
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Address $address
 * @property Purchase $purchase
 * @property ShippingCompany $shippingCompany
 */
class Shipping extends Model implements Auditable
{
    use SoftDeletes, CascadeSoftDeletes;
    use \OwenIt\Auditing\Auditable;

    /**
     * @var array
     */
    protected $fillable = ['shipping_company_id', 'purchase_id', 'address_id', 'tracking_number', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchase()
    {
        return $this->belongsTo('App\Models\Purchase');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shippingCompany()
    {
        return $this->belongsTo('App\Models\ShippingCompany');
    }
}
