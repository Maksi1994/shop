<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Category;

class Shop extends Model
{
    public $timestamps = true;
    public $guarded = [];

    public function category() {
      return $this->belongsTo(Category::class);
    }

    public function images() {
      return $this->morphMany(Image::class, 'imageable');
    }

    public function workers() {
      return $this->belongsTo(Worker::class, 'shop_worker', 'shop_id', 'worker_id');
    }

    public static function saveOne($data) {
      $shop = self::updateOrCreate(['id' => $data['id']], [
        'name'=> $data['nam'],
        'category_id' => $data['category_id']
      ]);
      $images = [];

      foreach ($data['files'] as $file) {

      }

      Image::destroyMany($data['deleted_images']);

    }
}
