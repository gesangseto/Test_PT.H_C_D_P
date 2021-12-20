<?php

namespace App\Http\Controllers\API;

use App\ApiRes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Customer;

class CustomerController extends Controller
{
    public function get(Request $request)
    {
        $getData = Customer::with(['city', 'province']);
        foreach ($request->all() as $key => $value) {
            if (is_numeric($value)) {
                $getData->where("$key", $value);
            } else {
                $getData->where("$key", 'like', "%$value%");
            }
        }
        $customer = $getData->get();
        return ApiRes::send(1, 'List data Customer', $customer);
    }

    public function insert(Request $request)
    {
        $required_data = ['name', 'province_id', 'city_id'];
        foreach ($required_data as $req) {
            if (!$request->$req) {
                return ApiRes::send(0, "$req is required!");
            }
        }

        Customer::create([
            'name' => $request->name,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
        ]);
        return ApiRes::send(1, 'Insert data Customer success');
    }

    public function update(Request $request)
    {
        $required_data = ['id', 'name', 'province_id', 'city_id'];
        foreach ($required_data as $req) {
            if (!$request->$req) {
                return ApiRes::send(0, "$req is required!");
            }
        }
        Customer::where('id', '=', $request->id)->update([
            'name' => $request->name,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
        ]);
        return ApiRes::send(1, 'Update data Customer success');
    }

    public function delete(Request $request)
    {
        $required_data = ['id'];
        foreach ($required_data as $req) {
            if (!$request->$req) {
                return ApiRes::send(0, "$req is required!");
            }
        }
        Customer::where('id', '=', $request->id)->delete();
        return ApiRes::send(1, 'Delete data Customer success');
    }
}
