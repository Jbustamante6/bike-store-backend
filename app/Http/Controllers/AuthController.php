<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Services\AuthenticationService;
use App\Http\Requests\Auth\UpdateMe;
use App\Utils\Constants\ResponseMessages;
use App\Http\Requests\Auth\Auth;
use App\Utils\Enums\HttpResponseEnum;
use OutOfBoundsException;
use Exception;

class AuthController extends Controller
{
    private AuthenticationService $authService;

    public function __construct(AuthenticationService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Auth $request)
    {
        try {
            $user = $this->authService->login($request['email'], $request['password']);
            return \ResponseHelper::GetSuccesResponse($user, HttpResponseEnum::HTTP_OK);
        } catch (OutOfBoundsException $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::NOT_FOUND_ERROR_RESPONSE, $e, HttpResponseEnum::HTTP_NOT_FOUND);
        } catch (HttpResponseException $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::UNAUTHORIZED, $e, HttpResponseEnum::HTTP_UNAUTHORIZED);
        } catch (ModelNotFoundException $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::NOT_FOUND_ERROR_RESPONSE, $e, HttpResponseEnum::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, HttpResponseEnum::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout()
    {
        try {
            $user = $this->authService->logout();
            return \ResponseHelper::GetSuccesResponse($user, HttpResponseEnum::HTTP_OK);
        } catch (OutOfBoundsException $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::NOT_FOUND_ERROR_RESPONSE, $e, HttpResponseEnum::HTTP_NOT_FOUND);
        } catch (ModelNotFoundException $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::NOT_FOUND_ERROR_RESPONSE, $e, HttpResponseEnum::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, HttpResponseEnum::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function refresh()
    {
        try {
            $token = $this->authService->refresh();
            return \ResponseHelper::GetSuccesResponse($token, HttpResponseEnum::HTTP_OK);
        } catch (OutOfBoundsException $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::NOT_FOUND_ERROR_RESPONSE, $e, HttpResponseEnum::HTTP_NOT_FOUND);
        } catch (ModelNotFoundException $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::NOT_FOUND_ERROR_RESPONSE, $e, HttpResponseEnum::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, HttpResponseEnum::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function me()
    {
        try {
            $user = $this->authService->me();
            return \ResponseHelper::GetSuccesResponse($user, HttpResponseEnum::HTTP_OK);
        } catch (OutOfBoundsException $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::NOT_FOUND_ERROR_RESPONSE, $e, HttpResponseEnum::HTTP_NOT_FOUND);
        } catch (ModelNotFoundException $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::NOT_FOUND_ERROR_RESPONSE, $e, HttpResponseEnum::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, HttpResponseEnum::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateMe(UpdateMe $request)
    {
        try {
            $user = $this->authService->updateMe($request['document_type_id'], $request['doc_number'], $request['first_name'], $request['last_name'], $request['username'], $request['new_password']);
            return \ResponseHelper::GetSuccesResponse($user, HttpResponseEnum::HTTP_OK);
        } catch (OutOfBoundsException $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::NOT_FOUND_ERROR_RESPONSE, $e, HttpResponseEnum::HTTP_NOT_FOUND);
        } catch (ModelNotFoundException $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::NOT_FOUND_ERROR_RESPONSE, $e, HttpResponseEnum::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return \ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, HttpResponseEnum::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
