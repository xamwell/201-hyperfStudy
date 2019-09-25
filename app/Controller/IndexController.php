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
use Psr\Container\ContainerInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class IndexController extends Controller
{

    public function index(ResponseInterface $response)
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return $response->json([
            'method' => $method,
            'message' => "Hello 22{$user}.6666",
        ]);
    }
}
