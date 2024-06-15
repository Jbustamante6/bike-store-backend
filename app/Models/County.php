<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property State[] $states
 */
class County extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'countries';

    /**
     * @var array
     */
    protected $fillable = ['name', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function states()
    {
        return $this->hasMany('App\Models\State');
    }
}
