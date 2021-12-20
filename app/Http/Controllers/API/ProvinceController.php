<?php

namespace App\Http\Controllers\API;

use App\ApiRes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Province;

class ProvinceController extends Controller
{
    public function get(Request $request)
    {
        $getData = new Province;
        foreach ($request->all() as $key => $value) {
            if (is_numeric($value)) {
                $getData->where("$key", $value);
            } else {
                $getData->where("$key", 'like', "%$value%");
            }
        }
        $data = $getData->get();
        return ApiRes::send(1, 'List data Province', $data);
    }

    public function insert(Request $request)
    {
        $required_data = ['name'];
        foreach ($required_data as $req) {
            if (!$request->$req) {
                return ApiRes::send(0, "$req is required!");
            }
        }

        Province::create([
            'name' => $request->name,
        ]);
        return ApiRes::send(1, 'Insert data Province success');
    }

    public function update(Request $request)
    {
        $required_data = ['id', 'name',];
        foreach ($required_data as $req) {
            if (!$request->$req) {
                return ApiRes::send(0, "$req is required!");
            }
        }
        Province::where('id', '=', $request->id)->update([
            'name' => $request->name,
        ]);
        return ApiRes::send(1, 'Update data Province success');
    }

    public function delete(Request $request)
    {
        $required_data = ['id'];
        foreach ($required_data as $req) {
            if (!$request->$req) {
                return ApiRes::send(0, "$req is required!");
            }
        }
        Province::where('id', '=', $request->id)->delete();
        return ApiRes::send(1, 'Delete data Province success');
    }
}
