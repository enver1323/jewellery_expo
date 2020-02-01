<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Resources\APIItems;
use App\Http\Resources\BaseJsonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class APIController extends Controller implements APIItems
{
    /**
     * @param BaseJsonResource|AnonymousResourceCollection $resource
     * @param int $code
     * @param string $message
     * @return mixed
     */
    protected function render($resource, int $code = 200, string $message = null)
    {
//        if(!request()->ajax())
//            abort(404);

        $resource = $resource->additional([
            self::CODE => $code,
            self::MESSAGE => $message
        ])->response()->setStatusCode($code);

        return $resource;
    }
}
