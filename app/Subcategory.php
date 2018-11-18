<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
  protected $guarded = [];
  protected $primaryKey = 'subcategoryID';

  public function category()
  {
    return $this->belongsTo(Category::class, 'categoryID');
  }

}
