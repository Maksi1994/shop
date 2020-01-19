<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = true;
    public $guarded = [];

    public function imageable() {
      return $this->morphTo();
    }

    public static function destroyMany($imagesIds) {
        $images = self::whereIn($imagesIds)->get();

        foreach ($images as $img) {
          $img->delete($id);
        }
    }


    public static function boot() {
        parent::boot();

        static::deleting(function ($img) {

        });
    }
}
