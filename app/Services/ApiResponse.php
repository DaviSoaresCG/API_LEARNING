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

    public static function error($message)
    {
        return response()->json([
            'status_code' => 500,
            'message' => $message
        ],500);
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