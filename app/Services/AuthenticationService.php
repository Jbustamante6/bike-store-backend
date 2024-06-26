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
        return auth()->user()->only('id', 'first_name', 'last_name', 'email', 'username');
    }

    public function updateMe(int $document_type_id, int $doc_number, string $first_name, string $last_name, string $username, string $password = NULL)
    {
        $user = auth()->user();

        $user->first_name = $first_name;
        $user->username = $username;

        if (isset($password)){
            $user->password = Hash::make($password);
        }

        $user->save();
        return $user->only('id', 'document_type_id', 'doc_number', 'first_name', 'last_name', 'username');
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
