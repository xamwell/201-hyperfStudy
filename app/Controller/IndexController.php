<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller;
use App\Traits\ApiResponse;
use Psr\Container\ContainerInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class IndexController extends Controller
{
    use ApiResponse;

    public function index(ResponseInterface $response)
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();
        logger()->info('test',[
            'method' => $method,
            'message' => "Hello {$user}.12312312312312",
        ]);
        return $this->error('fail',403);
        return $this->response([
            'method' => $method,
            'message' => "Hello {$user}.12312312312312",
        ],'success');
    }
}
