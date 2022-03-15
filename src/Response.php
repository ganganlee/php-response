<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2022/3/15
 * Time: 9:24
 */

namespace Ganganlee\PhpResponse;
class Response
{
    /**
     * 响应成功
     * @param $data
     * @param string $msg
     * @param int $code
     */
    public static function ResponseSuccess($data = null, string $msg = '', int $code = 200): void
    {
        die(self::encodeResponse($data, $msg, $code));
    }

    /**
     * 响应失败
     * @param string $msg
     * @param int $code
     * @param string $data
     */
    public static function ResponseError(string $msg, int $code = 400, $data = ''): void
    {
        die(self::encodeResponse($data, $msg, $code));
    }

    /**
     * 组织响应数据
     * @param $data
     * @param $msg
     * @param $code
     * @return string
     */
    private static function encodeResponse($data, $msg, $code): string
    {
        $response = [
            'data' => $data,
            'msg' => $msg,
            'code' => $code,
            'timestamp' => date('Y-m-d H:i:s')
        ];

        return json_encode($response, 256);
    }
}