<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Utils\Constants\ResponseMessages;
use App\Utils\Enums\HttpResponseEnum;
use App\Helpers\ResponseHelper;
use Exception;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::with(['status','type'])->get();
            return ResponseHelper::GetSuccesResponse($products, HttpResponseEnum::HTTP_OK);
        } catch (Exception $e) {
            return ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, $e->getCode());
        }

    }

    public function store(StoreProductRequest $request)
    {
        try {
            $product = Product::create($request->validated());
            return ResponseHelper::GetSuccesResponse($product, HttpResponseEnum::HTTP_CREATED);
        }catch (Exception $e) {
            return ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, $e->getCode());
        }
    }

    public function show(Product $product)
    {
        try {
            return ResponseHelper::GetSuccesResponse($product, HttpResponseEnum::HTTP_OK);
        } catch (Exception $e) {
            return ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, $e->getCode());
        }
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $product->update($request->validated());
            return ResponseHelper::GetSuccesResponse($product, HttpResponseEnum::HTTP_OK);
        } catch (Exception $e) {
            return ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, $e->getCode());
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return ResponseHelper::GetSuccesResponse(null, HttpResponseEnum::HTTP_NO_CONTENT);
        }catch (Exception $e) {
            return ResponseHelper::GetErrorResponse(ResponseMessages::GENERIC_ERROR_MESSAGE, $e, $e->getCode());
        }
    }


    }
