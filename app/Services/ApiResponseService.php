<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 10/11/16
 * Time: 20:08
 */

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Response;

class ApiResponseService
{
    public static function success($result = [], $message = 'success',$statusCode = 200, $header = [])
    {
        if (is_array($result) or is_object($result) and !empty($result)) {
            if (is_object($result) and ($result instanceof Collection)) {
                $result = $result->toArray();
            }
            $responseResult['msg'] = $message;
            $responseResult['result'] = null_to_empty($result);
        } elseif (func_num_args() === 0) {
            $responseResult['msg'] = $message;
            $responseResult['result'] = [];
        } else {
            $responseResult['msg'] = $result;
            $responseResult['result'] = [];
        }
        $responseResult['status'] = $statusCode;
        return Response::json($responseResult, $statusCode, array_merge(['server-response-code' => $statusCode], $header), JSON_NUMERIC_CHECK);
    }

    public static function fail($message = 'fail', $statusCode = 500, $result = [])
    {
        if (is_object($result) and ($result instanceof Collection)) {
            $result = $result->toArray();
        }
        $responseResult = ['msg' => $message, 'result' => null_to_empty($result), 'status' => $statusCode];
        return Response::json($responseResult, $statusCode, ['server-response-code' => $statusCode], JSON_NUMERIC_CHECK);
    }
}