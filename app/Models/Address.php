<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property integer $id
 * @property integer $city_id
 * @property integer $user_id
 * @property string $address
 * @property integer $is_default
 * @property string $postal_code
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property City $city
 * @property User $user
 * @property Shipping[] $shippings
 */
class Address extends Model implements Auditable
{
    use SoftDeletes, CascadeSoftDeletes;
    use \OwenIt\Auditing\Auditable;
    /**
     * @var array
     */
    protected $fillable = ['city_id', 'user_id', 'address', 'is_default', 'postal_code', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shippings()
    {
        return $this->hasMany('App\Models\Shipping');
    }
}
