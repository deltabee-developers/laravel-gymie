<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    //Eloquence Search mapping
    use Eloquence;
    use createdByUser, updatedByUser;

    protected $table = 'mst_questiontypes';

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
