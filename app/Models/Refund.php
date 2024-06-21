<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $refund_status_id
 * @property integer $purchase_id
 * @property mixed $details
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Purchase $purchase
 * @property RefundStatus $refundStatus
 */
class Refund extends Model implements Auditable
{
    use SoftDeletes, CascadeSoftDeletes;
    use \OwenIt\Auditing\Auditable;
    /**
     * @var array
     */
    protected $fillable = ['refund_status_id', 'purchase_id', 'details', 'deleted_at', 'created_at', 'updated_at'];

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
    public function refundStatus()
    {
        return $this->belongsTo('App\Models\RefundStatus', 'refund_status_id');
    }
}
