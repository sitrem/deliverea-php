<?php

namespace Deliverea\Response;


use Illuminate\Http\Exception\HttpResponseException;

class ApiErrorResponse
{
    static function response($err_ar, $err_code = '400', $throwException = true)
    {
        $resp_ar = array(
            'status' => 'err',
            'data' => $err_ar,
        );

        $resp = response()->json($resp_ar, $err_code);

        if ($throwException) {
            throw new HttpResponseException(self::build_response($resp));
        }

        return $resp;
    }

    static function build_response($response)
    {

        return $response;

    }
}