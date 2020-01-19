<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Supports\Validator;
use App\{Shop, Category};
use App\Resources\Shops\{ShopsResource, ShopsResource};

class ShopsController extends Controller
{
    public function save(Request $request) {
        $validation = Validator::make($request->all(), [
            'id' => 'exists:shops',
            'name' => 'required|min:3',
            'category_id' => 'required|exists:shop_categories,id',
        ]);
        $success = false;

        if (!$validation->fails()) {
            Shop::saveOne($request);
            $success = true;
        }

        return $this->success($success);
    }

    public function getOne(Request $request) {
        $shop = Shop::with(['images', 'category', 'workers'])->find($request->id);

        return new ShopsResource($shop);
    }

    public function saveCagetories(Request $request) {
        $validation = Validator::make($request->all(), [
          'categories.*.id' => 'exists:shop_categories,id',
          'categories.*.name' => 'required|min:3',
        ]);
        $success = false;

        if (!$validation->fails()) {
            $success = false;
            Category::saveAll($request);
        }

        return $this->success($success);
    }

    public function delete(Request $request) {
      $success = (boolean) Shop::destroy($request->id);

      return $this->success($success);
    }
}
