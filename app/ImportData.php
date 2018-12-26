<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportData extends Model
{
    protected $table = 'import_data';
    protected $fillable = [
        'crm_id',
        'ab_id',
        'ab_owner_id',
        'ab_owner_full_name',
        'company_name',
    ];
}
