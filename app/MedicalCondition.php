<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class MedicalCondition extends Model
{
    //Eloquence Search mapping
    use Eloquence;
    use createdByUser, updatedByUser;

    protected $table = 'mst_medical_conditions';

    protected $fillable = [
        'name',
        'description',
        'created_by',
        'updated_by',
    ];

    protected $searchableColumns = [
        'name' => 20,
        'description' => 10,
    ];

}
