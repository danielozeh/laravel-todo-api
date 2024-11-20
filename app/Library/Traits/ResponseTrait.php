<?php

namespace App\Library\Traits;

use App\Library\Master;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

trait ResponseTrait
{

    public static function successResponse($message = 'Success', $data = null, $status = 200)
    {
        $res = [
            'status' => true,
            'message' => $message
        ];
        if ($data) {
            $res['data'] = $data;
        }
        return response()->json($res, $status);
    }

    public static function failureResponse($message = 'Error Occurred', $data = null, $status = 400, $type = '')
    {
        $res = [
            'status' => false,
            'message' => $message
        ];
        if ($type) {
            $res['type'] = $type;
        }
        if ($data) {
            $res['data'] = $data;
        }
        return response()->json($res, $status);
    }

    public static function validationResponse($validator)
    {
        $errors = $validator->errors()->all();
        $res = [
            'status' => false,
            'message' => collect($errors)->reduce(function ($carry, $item) {
                return $carry . $item . " ";
            }),
            'data' => $errors
        ];
        return response()->json($res, 422);
    }

    /**
     * @throws \Throwable
     */
    public static function exceptionResponse(\Throwable $exception, $module = '')
    {
        if (DB::transactionLevel()) {
            DB::rollBack();
        }

        if ($exception instanceof \Illuminate\Database\QueryException) {
            $message = $exception->errorInfo;
        } else {
            $message = $exception->getMessage();
        }

        $payload = [
            'status' => 'false',
            'error' => $message,
            'file' => $exception->getFile(),
            'code' => $exception->getCode(),
            'line' => $exception->getLine(),
            'message' => "Exception in module: {$module}",
            'details' => $exception->getTraceAsString()
        ];

        if (!Master::hasDebug()) {
            Log::error(json_encode($payload));
            return Master::failureResponse( 'Service error occurred. Please try again later', 500);
        }

        return response()->json($payload, 500);
    }
}
