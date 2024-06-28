<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
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
    public function store(StoreServiceRequest $request)
    {
        try {
            $service = Service::create($request->validated());
            return ResponseHelper::GetSuccesResponse($service, HttpResponseEnum::HTTP_CREATED);
        } catch (Exception $e) {
            return ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, $e->getCode());
        }

    }

    public function show(Service $service)
    {
        try {
            return ResponseHelper::GetSuccesResponse($service, HttpResponseEnum::HTTP_OK);
        } catch (Exception $e) {
            return ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, $e->getCode());
        }
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        try {
            $service->update($request->validated());
            return ResponseHelper::GetSuccesResponse($service, HttpResponseEnum::HTTP_OK);
        } catch (Exception $e) {
            return ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, $e->getCode());

        }
    }

    public function destroy(Service $service)
    {
        try {
            $service->delete();
            return ResponseHelper::GetSuccesResponse(null, HttpResponseEnum::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            return ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, $e->getCode());
        }
    }
}
