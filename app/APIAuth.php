<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class APIAuth extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'api_auth';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'access_token', 'ip', 'expires_on'];

    /**
     * Get the user info associated with the customer.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
