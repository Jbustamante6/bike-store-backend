<?php

namespace App\Http\Controllers;

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
}
