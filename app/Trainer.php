<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    //Eloquence Search mapping
      use Eloquence;
    use createdByUser, updatedByUser;

    protected $table = 'trainer';

    protected $fillable = [
        'id',
        'name',
        'address',
        'DOB',
        'proof_photo',
        'education',
        'languages',
        'timings',
        'certification',
        'created_by',
        'updated_by',
    ];

    protected $searchableColumns = [
        'name' => 20
    ];

    protected $dates = ['created_at', 'updated_at', 'DOB'];
}
