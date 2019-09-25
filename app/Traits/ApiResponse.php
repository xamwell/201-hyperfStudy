<?php
namespace App\Traits;

use Hyperf\HttpServer\Contract\ResponseInterface;
use App\Exception\HttpException;

trait ApiResponse {
    /**
     * 返回错误
     *
     * @param string $message
     * @param int $statusCode
     * @return HttpException
     */
    public function error(string $message, int $statusCode):HttpException
    {
        throw new HttpException($message,$statusCode);
    }
    /**
     * 返回数据
     *
     * @param array|null $data
     * @param int $code
     * @param string|null $message
     * @return ResponseInterface
     */
    public function response(?array $data, string $message = null, int $code = 200)
    {
        return response()->json(compact('data', 'code', 'message'));
    }
}