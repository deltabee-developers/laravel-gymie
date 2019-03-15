<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
      protected $table = 'feedback';

      protected $fillable = [
          'id',
          'member_id',
          'trainer_id',
          'program_id',
          'description',
      ];
}
