<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'uploaded';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'file_type', 'storing_name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['user_id','id'];

}
