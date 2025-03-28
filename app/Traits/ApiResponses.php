<?php

namespace App\Traits;

trait ApiResponses
{
    protected function ok($message, $data = null)
    {
        return $this->success($message, $data, 200);
    }

    protected function success($message, $data = null, $statusCode = 200)
    {
        return $this->response($message, $data)->json([
            'message' => $message,
            'data' => $data,
            'status' => $statusCode,
        ], $statusCode);
    }
    protected function error($message, $statusCode)
    {
        return $this->response($message)->json([
            'message' => $message,
            'status' => $statusCode,
        ], $statusCode);
    }
}
