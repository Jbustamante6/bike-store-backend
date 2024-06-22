<?php

namespace App\Helpers;
use App\Utils\Models\ErrorResponseModel;
use App\Utils\Models\BaseResponseModel;
use Exception;
class ResponseHelper
{
    public static function GetSuccesResponse($data = null, $responseCode, $view =  null): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $response = new BaseResponseModel;
        $response->data = $data;
        if($view){
            return view($view, ['response' => $response->data]);
        }
        return response()->json($response, $responseCode);

    }
    public static function GetErrorResponse($message, $exception, $responseCode, $errors = [])
    {
        $response = new ErrorResponseModel;
        $response->message = $message;
        $response->exceptionMessage = $exception ? $exception->getMessage(): NULL;
        $response->errors = $errors;

        return response()->json($response, $responseCode);
    }
    public static function GetErrorFromRequest($message, $errors = [], $responseCode)
    {
        $response = new ErrorResponseModel;
        $response->message = $message;
        $response->errors = $errors;
        $response->exceptionMessage = "Complete the required fields";
        return response()->json($response, $responseCode);
    }
    public static function ParseResponseToJson($response)
    {
        $content = $response->getContent();
        $data = json_decode($content);
        if (is_null($data) && json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("JSON decode error");
        }
        return $data;
    }
}
