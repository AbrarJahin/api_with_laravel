<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerServiceScheduling extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partner_service_scheduling';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['partner_id', 'scheduled_service_id'];
}
