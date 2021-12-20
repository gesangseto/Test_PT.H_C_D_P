<?php

namespace App\Library;

use App\Configuration;
use App\MstUser;
use Illuminate\Support\Collection;

class Auth
{
    static public function attempt($data)
    {
        $getUser = MstUser::orWhere([
            'email' => $data['email'],
            'username' => $data['email'],
        ])->first();

        if (empty($getUser)) {

            $getUser = Configuration::orWhere([
                'users_name' => $data['email'],
            ])->first();

            // return $getUser;

            if (empty($getUser)) {
                return false;
            } else {

                $hash = $getUser->users_password;
                if (base64_encode($data['password']) == $hash) {
                // if (password_verify($data['password'], $hash)) {
                    return [
                        'type' => 'super_admin',
                        'data' => $getUser
                    ];
                } else {
                    return false;
                }
            }
        }

        $checkPass = ($getUser->pwd == base64_encode($data['password']));

        if (!$checkPass) {
            return false;
        }

        return [
            'type' => 'default',
            'data' => $getUser
        ];
    }
}
