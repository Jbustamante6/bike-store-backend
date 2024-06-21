<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;


/**
 * @property integer $id
 * @property integer $document_type_id
 * @property integer $doc_number
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Address[] $addresses
 * @property Book[] $books
 * @property Book[] $books
 * @property Purchase[] $purchases
 * @property Purchase[] $purchases
 * @property DocumentType $documentType
 */
class User extends Authenticatable implements Auditable
{
    use HasApiTokens, HasFactory;
    use SoftDeletes, CascadeSoftDeletes;
    use HasRoles;
    use \OwenIt\Auditing\Auditable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = ['document_type_id', 'doc_number', 'first_name', 'last_name', 'email', 'username', 'password', 'deleted_at', 'created_at', 'updated_at'];


    protected $hidden = [
        'password',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function booksBuyed()
    {
        return $this->hasMany('App\Models\Book', 'purchaser_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function booksSold()
    {
        return $this->hasMany('App\Models\Book', 'seller_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchasesBuyed()
    {
        return $this->hasMany('App\Models\Purchase', 'purchaser_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchasesSold()
    {
        return $this->hasMany('App\Models\Purchase', 'seller_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function documentType()
    {
        return $this->belongsTo('App\Models\DocumentType');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\MorphMany
    */
    public function pqrs_requested()
    {
        return $this->morphMany('App\Models\HowItWorks', 'claimant');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\MorphMany
    */
    public function pqrs_assigned()
    {
        return $this->morphMany('App\Models\HowItWorks', 'responsible');
    }

}
