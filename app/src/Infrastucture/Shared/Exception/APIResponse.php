<?php

namespace App\src\Infrastucture\Shared\Exception;
use Illuminate\Http\Response;

trait APIResponse
{
    protected function apiResponse($message = null, int $status = 200, $data = [])
    {

        $response = new Response(json_encode([
            'message' => $message,
            'data' => $data
        ]), $status);

        $response->header('Content-Type', 'application/json');

        return $response;

    }
}
