<?php

namespace App\Http\Middleware;

use App\Utils\Enums\HttpResponseEnum;
use Exception;
use Closure;
use JWTAuth;

class JWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        }catch(Exception $e){
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return \ResponseHelper::GetErrorResponse('Token is Invalid', $e, HttpResponseEnum::HTTP_UNAUTHORIZED);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return \ResponseHelper::GetErrorResponse('Token expired', $e, HttpResponseEnum::HTTP_UNAUTHORIZED);
            }else{
                return \ResponseHelper::GetErrorResponse('Authorization Token not found', $e, HttpResponseEnum::HTTP_UNAUTHORIZED);
            }
        }
        return $next($request);
    }
}
