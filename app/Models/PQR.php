<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * @property integer $id
 * @property integer $pqr_types_id
 * @property integer $pqr_status_id
 * @property string $comment
 * @property string $email
 * @property string $claimant_type
 * @property integer $claimant_id
 * @property string $responsible_type
 * @property integer $responsible_id
 * @property string $answer
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property PQRStatus $pqrStatus
 * @property PQRType $pqrType
 */
class PQR extends Model implements Auditable
{
    use SoftDeletes, CascadeSoftDeletes;
    use \OwenIt\Auditing\Auditable;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pqrs';

    /**
     * @var array
     */
    protected $fillable = ['pqr_types_id', 'pqr_status_id', 'comment', 'email', 'claimant_type', 'claimant_id', 'responsible_type', 'responsible_id', 'answer', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pqrStatus()
    {
        return $this->belongsTo('App\Models\PQRStatus', 'pqr_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pqrType()
    {
        return $this->belongsTo('App\Models\PQRType', 'pqr_types_id');
    }

    /**
     * Get the owning section pqrs model.
     */
    public function pqrs()
    {
        return $this->morphTo();
    }
}
