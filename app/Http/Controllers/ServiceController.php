<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Utils\Constants\ResponseMessages;
use App\Utils\Enums\HttpResponseEnum;
use App\Helpers\ResponseHelper;
use Exception;

class ServiceController extends Controller
{
    public function index()
    {
        try {
            $services = Service::with(['type'])->get();
            return ResponseHelper::GetSuccesResponse($services, HttpResponseEnum::HTTP_OK);
        } catch (Exception $e) {
            return ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, $e->getCode());
        }
    }
}
