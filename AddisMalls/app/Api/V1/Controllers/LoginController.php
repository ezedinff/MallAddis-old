<?php

namespace App\Api\V1\Controllers;

use App\User;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class LoginController extends Controller
{
    public function login(LoginRequest $request, JWTAuth $JWTAuth)
    {

            $credentials = $request->only(['tin_no', 'password']);

            try {
                $token = $JWTAuth->attempt($credentials);

                if(!$token) {
                    return response()
                        ->json([
                            'status' => 'unknown',
                            'token' => $token
                        ]);
                }

            } catch (JWTException $e) {
                throw new HttpException(500);
            }

            return response()
                ->json([
                    'status' => 'ok',
                    'token' => $token
                ]);



    }
}
