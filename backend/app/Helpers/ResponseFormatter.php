<?php

namespace App\Helpers;

/**
 * Format response.
 */
class ResponseFormatter
{
    /**
     * API Response
     *
     * @var array
     */
    protected static $response = [
        'meta' => [
            'code' => 200,
            'success' => true,
            'message' => null
        ],
        'data' => null
    ];

    /**
     * Give success response.
     */
    public static function success($data = null, $message = null, $pagination = null)
    {
        self::$response['data'] = $data;
        self::$response['meta']['success'] = true;
        self::$response['meta']['message'] = $message;
        self::$response['pagination'] = $pagination;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    /**
     * Give error response.
     */
    public static function error($data = null, $message = null, $code = 400)
    {
        self::$response['meta']['success'] = false;
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
