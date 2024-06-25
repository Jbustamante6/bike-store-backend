<?php

namespace App\Services;

use App\Interfaces\AuthenticationInterface;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Utils\Constants\ResponseMessages;
use App\Utils\Enums\HttpResponseEnum;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthenticationService implements AuthenticationInterface
{

    public function login(string $email, string $password)
    {
        $credentials = ['email' => $email, 'password' => $password];
        if(!$token = auth()->attempt($credentials)){
            throw new HttpResponseException(
                \ResponseHelper::GetErrorFromRequest(
                    ResponseMessages::REQUEST_MODEL_ERROR_RESPONSE,
                    ['message' => 'Email or password invalid'],
                    HttpResponseEnum::HTTP_UNAUTHORIZED
                )
            );
        }
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout(true);

        return ['message' => 'Successfully logged out'];
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function me()
    {
        return auth()->user()->only('uuid', 'name', 'email', 'username');
    }

    public function updateMe(string $name, string $username, string $password = NULL)
    {
        $user = auth()->user();

        $user->name     = $name;
        $user->username = $username;

        if (isset($password)){
            $user->password = Hash::make($password);
        }

        $user->save();
        return $user->only('uuid', 'name', 'email', 'username', 'status');
    }

    protected function respondWithToken($token)
    {
        auth()->setToken($token);
        return [
            'access_token'  => $token,
            'expires_in'    => Carbon::now()->addMinutes(auth()->factory()->getTTL())->format('Y-m-d'),
            'user'          => auth()->user()->only('first_name', 'last_name', 'email', 'username'),
        ];
    }
}
