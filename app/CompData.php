<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompData extends Model
{
    /**
     * This model is used as the control group of data to compare
     * to another data set.
     */

    protected $table = 'compare_data';

    protected $fillable = [
        'crm_id',
        'ab_id',
        'ab_owner_id',
        'ab_owner_full_name',
        'company_name',
    ];

    public function compareSfdc()
    {
        return $this->hasOne('App\ImportData', 'crm_id', 'crm_id');
    }

    public function compareAb()
    {
        return $this->belongsTo('App\ImportData', 'ab_id', 'ab_id');
    }

}
