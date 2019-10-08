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
use Hyperf\HttpServer\Contract\ResponseInterface;
use \Phper666\JwtAuth\Jwt;
use App\Model\User;

class IndexController extends Controller
{
    use ApiResponse;

    public function index(ResponseInterface $response,Jwt $jwt)
    {
        $userData = [
            'uid' => 1,
            'username' => 'xx',
            'prv' => sha1(User::class)
        ];
        $token = (string)$jwt->getToken($userData);

//        var_dump($jwt->getParserData());
//        var_dump($jwt->validateToken($token));
//        var_dump(Coroutine::inCoroutine());
//        var_dump(Coroutine::id());
//
        foreach ([1,2,3,4,5,6,7,8,9,10] as $item) {
            var_dump($item);
//            var_dump(Hyperf\Utils\Coroutine\Coroutine::inCoroutine());
//            var_dump(Hyperf\Utils\Coroutine\Coroutine::id());
        }
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();
        logger()->info('test',[
            'method' => $method,
            'message' => "Hello {$user}.12312312312312",
        ]);
//        return $this->error('fail',403);
        return $this->response([
            '$token' => $token,
            'msg' => $jwt->getParserData(),
            'message' => "Hello {$user}.12312312312312",
        ],'success');
    }
}
