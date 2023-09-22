<?php

namespace App\Http\Controllers;

use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        $code = Response::HTTP_OK;
        $success = true;
        $message = 'Data Succeed';
        
        $types = Type::with('product')->get(['id', 'name', 'product_id', 'color']);

        if($request?->product_id){
            $types = $types->where('product_id', $request?->product_id);
        }

        return TypeResource::collection($types)->additional(
            [
                'code' => $code,
                'success' => $success,
                'message' => $message,
            ]
        );

        // return new TypeResource($types)->additional([
        //     'code' => $code,
        //         'success' => $success,
        //         'message' => $message,
        // ]);
    }
}
