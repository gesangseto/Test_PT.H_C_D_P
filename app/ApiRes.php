<?php

namespace App;

class ApiRes
{
    static public function send($status, $message, $data = [])
    {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }

    static function sendErrorValidation($validator)
    {

        foreach ($validator->errors()->messages() as $err) {
            $error = $err[0];
            break;
        }

        return self::send(0, $error);
    }

}
