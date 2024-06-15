<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
 * @property PqrStatuss $pqrStatuss
 * @property PqrType $pqrType
 */
class PQR extends Model
{
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
    public function pqrStatuss()
    {
        return $this->belongsTo('App\Models\PqrStatuss', 'pqr_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pqrType()
    {
        return $this->belongsTo('App\Models\PqrType', 'pqr_types_id');
    }
}
