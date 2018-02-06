<?php

namespace Lisar\Model;

use Illuminate\Database\Eloquent\Model;

class Lance extends Model
{
  protected $fillable = [
      'produto_id', 'user_id', 'valor',
  ];
}
