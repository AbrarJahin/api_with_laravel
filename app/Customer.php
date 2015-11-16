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
    protected $primaryKey = 'user_id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'neighbourhood', 'email'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['user_id','id'];

    /**
     * Disabling the timestamps (created_at and updated_at) because it is already in user table
     *
     * @var array
     */
    public $timestamps  = false;
}
