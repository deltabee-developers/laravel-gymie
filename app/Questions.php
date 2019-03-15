<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    //Eloquence Search mapping
    use Eloquence;
    use createdByUser, updatedByUser;

    protected $table = 'mst_questions';

    protected $fillable = [
        'name',
        'question_type_id',
        'created_by',
        'updated_by',
    ];

    protected $searchableColumns = [
        'name' => 20,
    ];

}
