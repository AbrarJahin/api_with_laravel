<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'neighbourhood', 'email'];

    /**
     * Disabling the timestamps (created_at and updated_at) because it is already in user table
     *
     * @var array
     */
    public $timestamps  = false;

    /**
     * Get the user info associated with the customer.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
