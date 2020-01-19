<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
  public $timestamps = true;
  public $guarded = [];

  public function shops() {
    return $this->hasMany(Shops);
  }

  public static function saveAll(Request $request) {
      foreach ($request->categories as $category) {
        self::updateOrCreate(['id' => $category['id']], $request->only('name'));
      }
  }
}
