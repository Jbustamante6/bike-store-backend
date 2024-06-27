<?php

namespace App\Http\Controllers;

use App\Services\UsersService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Utils\Constants\ResponseMessages;
use App\Http\Requests\Users\Register;
use App\Utils\Enums\HttpResponseEnum;
use OutOfBoundsException;
use Exception;

class UsersController extends Controller
{
    private UsersService $userService;
    public function __construct(UsersService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Register $request)
    {
        try {
            $user = $this->userService->register($request['document_type_id'], $request['doc_number'], $request['first_name'], $request['last_name'], $request['email'], $request['username'], $request['password']);
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

}
