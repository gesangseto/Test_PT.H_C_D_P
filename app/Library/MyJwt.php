<?php

namespace App\Library;

use \Firebase\JWT\JWT;


class MyJwt
{
    static public function encode($data)
    {
        $key = env('JWT_SECRET', 'jwt_secret');
        $payload = array(
            "iss" => "meindo_mertrack",
            "aud" => "meindo_mertrack",
            "iat" => time(),
            'data' => $data,
        );

        $jwt = JWT::encode($payload, $key);
        return $jwt;
    }
}
