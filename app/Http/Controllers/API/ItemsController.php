<?php

namespace App\Http\Controllers\API;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ItemsController extends BaseController
{
    public function list() 
    {
        return Item::with('items')->get();
    }

    public function generate(Request $request)
    {
        $count = $request->count;
        if ($count) {
            for ($i = 0; $i < $count; ++$i) {
                $parent = random_int(0, 1);
                $itemsCount = count(Item::all());
                Item::create([
                    'name' => md5(random_int(0, time())),
                    'target_id' => !$parent ? random_int(0, $itemsCount) : 0
                ]);
            }
            return 'You generated ' . $count . ' items!';
        }
        return abort(400);
    }
}
