<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'categoryID';

    //each category have many subcategories
    public function subcategories()
    {
      return $this->hasMany(Subcategory::class);
    }
}
