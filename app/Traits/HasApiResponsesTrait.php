<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;


trait HasApiResponsesTrait
{
    /**
     * @param string $message
     * @param array $data
     * @param int $statuscode 
     * 
     * @return JsonResponse
     */
    protected function responseWithSuccess(String $message, array $data = [], int $statusCode = 200):JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
    protected function responseWithError(String $message, array $data = [], int $statusCode = 400):JsonResponse
    {
        return response()->json([
            'success'=>false,
            'message'=>$message,
            'data'=> [],
        ], $statusCode);
    }

    /**
     * @param JsonResource $jsonResource
     * 
     * @return mixed
     */
    protected function responseForCollection(JsonResource $jsonResource) : mixed
    {
        return $jsonResource->response()->getData(true)['data'];
    }
}