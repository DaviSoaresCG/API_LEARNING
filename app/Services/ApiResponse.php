<?php
namespace App\Services;

class ApiResponse{
    public static function success($data)
    {
        return response()->json([
            'status_code' => '200',
            'message' => 'success',
            'data' => $data
        ],200);
    }

    public static function error($message, $code = 500)
    {
        return response()->json([
            'status_code' => $code,
            'message' => $message
        ],$code);
    }

    public static function unauthorized()
    {
        return response()->json([
            'status_code' => 401,
            'message' => 'Unauthorized'
        ],
        401
    );
    }
}