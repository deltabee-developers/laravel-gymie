<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //Eloquence Search mapping
    use Eloquence;
    use createdByUser, updatedByUser;

    protected $table = 'mst_programs';

    protected $fillable = [
        'name',
        'description',
        'program_icon',
        'created_by',
        'updated_by',
    ];

    protected $searchableColumns = [
        'name' => 20,
        'description' => 10,
    ];

}
