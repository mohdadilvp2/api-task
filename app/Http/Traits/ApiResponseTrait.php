<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    protected function successResponse(array $data, ?string $message = null, int $statusCode = JsonResponse::HTTP_OK)
    {
        return response()->json([
            'success'   => true,
            'data'      => $data,
            'message'   => $message,
        ], $statusCode);
    }

    protected function errorResponse(int $errorCode, string $message, int $statusCode)
    {
        return response()->json([
            'success'   => false,
            'error_code' => $errorCode,
            'message'   => $message,
        ], $statusCode);
    }
}
