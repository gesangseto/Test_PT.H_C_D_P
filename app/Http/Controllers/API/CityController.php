<?php

namespace App\Http\Controllers\API;

use App\ApiRes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\City;

class CityController extends Controller
{
    public function get(Request $request)
    {
        $getData = new City;
        foreach ($request->all() as $key => $value) {
            if (is_numeric($value)) {
                $getData->where("$key", $value);
            } else {
                $getData->where("$key", 'like', "%$value%");
            }
        }
        $data = $getData->get();
        return ApiRes::send(1, 'List data City', $data);
    }

    public function insert(Request $request)
    {
        $required_data = ['name', 'province_id'];
        foreach ($required_data as $req) {
            if (!$request->$req) {
                return ApiRes::send(0, "$req is required!");
            }
        }

        City::create([
            'name' => $request->name,
            'province_id' => $request->province_id,
        ]);
        return ApiRes::send(1, 'Insert data City success');
    }

    public function update(Request $request)
    {
        $required_data = ['id', 'name', 'province_id'];
        foreach ($required_data as $req) {
            if (!$request->$req) {
                return ApiRes::send(0, "$req is required!");
            }
        }
        City::where('id', '=', $request->id)->update([
            'name' => $request->name,
            'province_id' => $request->province_id,
        ]);
        return ApiRes::send(1, 'Update data City success');
    }

    public function delete(Request $request)
    {
        $required_data = ['id'];
        foreach ($required_data as $req) {
            if (!$request->$req) {
                return ApiRes::send(0, "$req is required!");
            }
        }
        City::where('id', '=', $request->id)->delete();
        return ApiRes::send(1, 'Delete data City success');
    }
}
