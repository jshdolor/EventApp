<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ApiController extends Controller
{
    use ValidatesRequests;

    /**
     * @param $res
     * @param \Closure $next
     * @return \Illuminate\Http\JsonResponse
     */
    protected function response($res, $status = 200, \Closure $next = null)
    {

        if (is_callable($next)) {

            return $next(response()->json([
                'data' => $res
            ]));

        }

        return response()->json([
            'data' => $res
        ], $status);
    }

    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = $this->getValidationFactory()
            ->make(
                $request->all(), 
                $rules, 
                $messages, 
                $customAttributes
            );

        if ($validator->fails()) {
            $error = new ValidationException($validator);
            throw $error;
        }
    }

}
